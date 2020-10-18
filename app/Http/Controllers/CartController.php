<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal = Cart::subtotal();
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = ($subtotal - $discount);
        if($newSubtotal < 0){
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;

        return view('front.cart',compact('discount','newSubtotal','newTax','newTotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $reservationCheck = new ReservationController();
        if ($reservationCheck->isRoomTaken($request->all())) {
            return redirect()->back()->with('error', 'This room is not available at the time you have chosen');
        }
        $paymentController = new PaymentController();
        $price = $paymentController->calculateprice($request->all());
        $room = Room::where('id',$request->room_id)->first();
        Cart::add($request->room_id, $room->name, 1, $price, 0,
        ['start_time'        => $request->start_time ,
         'end_time'          => $request->end_time,
         'capacity'          => $request->capacity ? $request->capacity : 1,
         'title'             => $request->title,
         'description'       => $request->description? $request->description : ''
         ])->associate('App\Room');

        return redirect()->back()->with('success', 'Booking Has Been Added please confirm your booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success','تم ازاله الاختبار بنجاح');
    }
    public function destroyCart()
    {
        Cart::destroy();
        return redirect()->route('welcome');
    }
}
