<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Latetime;
use App\Attendance;


class AdminController extends Controller
{

    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $totalEmp =  count(user::all());
        // $AllAttendance = count(Attendance::whereAttendance_date(date("Y-m-d"))->get());
        // $ontimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        // $latetimeEmp = count(Attendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());
        // $totalNumberOfBooks = count(Book::all());
        $data = [1, 2, 3, 4];
        return view('admin.index')->with(['data' => $data]);
        return view('admin.index');
    }

}
