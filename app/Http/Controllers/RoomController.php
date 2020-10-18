<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests\RoomRec;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room')->with('rooms', Room::all());

    }

    public function store(RoomRec $request)
    {
        $request->validated();

        $room = new Room;
        $room->name = $request->name;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->hourly_rate = $request->hourly_rate;
        $room->over_capacity = $request->over_capacity;
        $room->extra_price = $request->extra_price;
        $room->description = $request->description;

        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room Has Been Created Successfully');

    }

    public function update(RoomRec $request, Room $room)
    {
        $request->validated();

        $room->name = $request->name;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->hourly_rate = $request->hourly_rate;
        $room->over_capacity = $request->over_capacity;
        $room->extra_price = $request->extra_price;
        $room->description = $request->description;
        $room->save();
        return redirect()->route('rooms.index')->with('success', 'Room Has Been Updated Successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room Has Been Deleted Successfully');
    }
}
