<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentRoom;
use App\Room;
use App\Reservation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payment')->with('payments', Payment::all());

    }

    public function PaytabsPayment()
    {
        $merchant_email = env('PAYTABS_MERCHANT_EMAIL');
        $merchant_secretKey = env('PAYTABS_MERCHANT_SECRET_KEY');
        
        $subtotal = Cart::subtotal();
        $tax = config('cart.tax') / 100;
        $newTax = $subtotal * $tax;
        $newTotal = $subtotal + $newTax;
        
        
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newDisSubtotal = ($subtotal - $discount);
        $newDisTax = $newDisSubtotal * $tax;
        $newDisTotal = $newDisSubtotal + $newDisTax;

        $discount = $newTotal - $newDisTotal;
        
        $fullname = Auth::user()->name;
        $name = explode(' ',trim($fullname));
        $products = [];
        $productsprice = [];
        $productsquantity = [];
        foreach (Cart::content() as $item){
            $products[] =  $item->model->name;
            $productsprice[] = $item->price;
            $productsquantity[] = $item->qty;
        }

        $cartproducts = implode(" || ", $products);
        $cartprices = implode(" || ", $productsprice);
        $cartquantity = implode(" || ", $productsquantity);


        $PayTabsController = new PayTabsController();
        $pt = $PayTabsController->getInstance($merchant_email, $merchant_secretKey);
        // $pt = Paytabs::getInstance($merchant_email, $merchant_secretKey);

        $result = $pt->create_pay_page(array(
            "merchant_email" => $merchant_email,
            'secret_key' => $merchant_secretKey,
            'title' => "ٌReservation bill", // title of the action ex: order #123123
            'cc_first_name' => $name[0], // customer first name
            'cc_last_name' => 'null', //customer last name
            'email' => Auth::user()->email, //customer email
            'cc_phone_number' => "02", //country code
            'phone_number' => "01123456789", // customer phone number
    
            'billing_address' => "null",
            'city' => "null",
            'state' => "null",
            'postal_code' => "null",
            'country' => "EGY",
    
            'address_shipping' => "null",
            'city_shipping' => "null",
            'state_shipping' => "null",
            'postal_code_shipping' => "null",
            'country_shipping' => "EGY",
    
            //product information
            "products_per_title"=> $cartproducts, //Product title of the product. If multiple products then add || separator. 
            'currency' => "EGP", //currency
            "unit_price"=> $cartprices, //Unit price of the product. If multiple products then add || separator.
            'quantity' => $cartquantity, //Quantity of products. If multiple products then add || separator. 
            'other_charges' => $newTax, //tax
    
            'amount' => $newTotal, // = (unit_price * quantity) + other_charges
            'discount'=>$discount,    // discount
    
            "msg_lang" => "english",
            "reference_no" => "1231231",  //referance number
            "site_url" => "http://myeliteshop.xyz/",    // site that is registered in their website
            'return_url' => env('PAYTABS_RETURN_URL'), //redirect to after success and show response
            "cms_with_version" => "API USING PHP"
        ));
            if($result->response_code == 4012){
            return redirect($result->payment_url);
            }
            return redirect()->route('cart.index')->with('error', $result->result);
    }

    public function paymentResponse(Request $request)
    {
        $merchant_email = env('PAYTABS_MERCHANT_EMAIL');
        $merchant_secretKey = env('PAYTABS_MERCHANT_SECRET_KEY');
        $PayTabsController = new PayTabsController();
        $pt = $PayTabsController->getInstance($merchant_email, $merchant_secretKey);

        $result = $pt->verify_payment($request->payment_reference);
        if($result->response_code == 100){
            // Payment Success
            return $this->confermedPayment();

        }
        return redirect()->route('cart.index')->with('error', 'Payment Failed '.$result->result);
 
    }

    public function addPayment($request)
    {

        $room = Room::where('id', $request['room_id'])->first();

        $price = $this->calculateprice($request);

        $payment = Payment::create([
            'user_id'               => $request['user_id'] ? $request['user_id'] : auth()->user(),
            'payment_amount'        => $price,
            'payment_tax'           => 0,
            'payment_total'        => $price,
            'payment_method'        => 'offline',

        ]);

        PaymentRoom::create([
            'payment_id'    => $payment->id,
            'room_id'  => $room->id,
        ]);

        return true;
    }

    public function confermedPayment()
    {
        $ids = [];
        foreach (Cart::content() as $item){
            $ids[] =  $item->model->id;
            $reservation = Reservation::create([
                'title'         => $item->options->title,
                'start_time'    => $item->options->start_time,
                'end_time'      => $item->options->end_time,
                'user_id'       => auth()->id(),
                'room_id'       => $item->model->id,
                'description'   => $item->options->description,
    
            ]);
            $reservation = new Reservation;
            $reservation->title = $item->options->title;
            $reservation->start_time = $item->options->start_time;
            $reservation->end_time = $item->options->end_time;
            $reservation->user_id = auth()->id();
            $reservation->room_id = $item->model->id;
            $reservation->description = $item->options->description;
    
            $reservation->save();
        }
        $rooms = Room::whereIn('id', $ids)->get();

        $price = Cart::subtotal();

        $payment = Payment::create([
            'user_id'               => auth()->id(),
            'payment_amount'        => $price,
            'payment_tax'           => 0,
            'payment_total'        => $price,
            'payment_method'        => 'credit',

        ]);
        foreach($rooms as $room){
            PaymentRoom::create([
                'payment_id'    => $payment->id,
                'room_id'  => $room->id,
            ]);
        }
        Cart::destroy();

        return redirect('/#contact-us')->with('success', 'Reservation Has Been Created Successfully');
    }


    public function calculateprice($request)
    {
        $room = Room::where('id', $request['room_id'])->first();
        $extra = 0;
        if(!isset($request['capacity']) || $request['type'] == 'room')
        {
            $capacity = 1;
        }else{
            $capacity = $request['capacity'];
            if($capacity > $room->over_capacity){
                $extra = $capacity - $room->over_capacity;
            }
        }
        $time = round((strtotime($request['end_time']) - strtotime($request['start_time']))/3600, 1);
        $hours = ceil($time);
        $price = $hours * ($room->hourly_rate + ($extra * $room->extra_price));

        return $price;
    }
}
