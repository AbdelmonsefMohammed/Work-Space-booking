<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Room;
use App\User;
use Carbon\Carbon;

use App\Http\Requests\ReservationRec;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        $rooms = Room::all()->pluck('name', 'id')->prepend('Please select', '');

        $users = User::all()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.reservation', compact('reservations','rooms','users'));

    }
    public function store(ReservationRec $request)
    {
        if ($this->isRoomTaken($request->all())) {
            return redirect()->back()
                    ->with('error', 'This room is not available at the time you have chosen');
        }
        if($request->end_time < $request->start_time){
            return redirect()->back()
                ->with('error', "End time can't be earlier than Start time");
        }



        // $reservation = Reservation::create($request->all());
        $reservation = new Reservation;
        $reservation->title = $request->title;
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->user_id = $request->user_id;
        $reservation->room_id = $request->room_id;
        $reservation->description = $request->description;

        $reservation->save();

        //add payment
        $paymentController = new PaymentController();
        $addPayment = $paymentController->addPayment($request->all());



        return redirect()->route('reservations.index')->with('success', 'Reservation Has Been Created Successfully');

    }

    public function update(ReservationRec $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation Has Been Updated Successfully');

    }

    // public function show(Reservation $reservation)
    // {

    //     $reservation->load('room', 'user');

    //     return view('admin.events.show', compact('event'));
    // }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation Has Been Deleted Successfully');

    }

    public function isRoomTaken($requestData)
    {
        $start_time     = Carbon::parse($requestData['start_time']);
        $end_time       = Carbon::parse($requestData['end_time']);
        $reservations   = Reservation::where('room_id', $requestData['room_id'])->get();

        if (
            $reservations->where('start_time', '<', $start_time)->where('end_time', '>', $start_time)->count() ||
            $reservations->where('start_time', '<', $end_time)->where('end_time', '>', $end_time)->count() ||
            $reservations->where('start_time', '<', $start_time)->where('end_time', '>', $end_time)->count() ||
            $reservations->where('start_time', '>', $start_time)->where('end_time', '<', $end_time)->count()
        ) {
            return true;
        }

        return false;
    }
}
