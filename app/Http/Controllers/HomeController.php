<?php

namespace App\Http\Controllers;

use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $rooms = null;
        if($request->filled(['start_time', 'end_time', 'type'])) {
            if(Auth::check())
            {
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
                    return view('welcome', compact('rooms'));
            }else{
                return redirect()->route('login');
            }
        }

        return view('welcome', compact('rooms'));
    }
}
