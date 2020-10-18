<?php

namespace App\Http\Controllers;

use App\Room;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function searchRoom(Request $request)
    {
        $rooms = null;
        if($request->filled(['start_time', 'end_time', 'type'])) {
            $times = [
                Carbon::parse($request->input('start_time')),
                Carbon::parse($request->input('end_time')),
            ];

            $rooms = Room::where('type', $request->input('type'))
                ->whereDoesntHave('reservations', function ($query) use ($times) {
                    $query->whereBetween('start_time', $times)
                        ->orWhereBetween('end_time', $times)
                        ->orWhere(function ($query) use ($times) {
                            $query->where('start_time', '<', $times[0])
                                ->where('end_time', '>', $times[1]);
                        });
                })
                ->get();
        }

        return view('admin.search', compact('rooms'));
    }

    public function bookRoom(Request $request)
    {
        $request->merge([
            'user_id' => auth()->id()
        ]);

        $request->validate([
            'title'   => 'required',
            'room_id' => 'required',
        ]);

        $room = Room::findOrFail($request->input('room_id'));
        $reservationCheck = new ReservationController();
        if ($reservationCheck->isRoomTaken($request->all())) {
            return redirect()->back()->with('error', 'This room is not available at the time you have chosen');
        }
        $reservation = Reservation::create($request->all());

        $paymentController = new PaymentController();
        $addPayment = $paymentController->addPayment($request->all());

        return redirect()->route('systemCalendar')->withStatus('A room has been successfully booked');
    }
}
