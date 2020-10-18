@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reservations
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reservations</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addNewReservation" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th> Title </th>
                                <th>Start time</th>
                                <th>End time</th>
                                <th>Room</th>
                                <th>User</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                <tr>
                                    <td> {{$reservation->title}} </td>
                                    <td> {{$reservation->start_time}} </td>
                                    <td> {{$reservation->end_time}} </td>
                                    <td> {{$reservation->room->name}} </td>
                                    <td> {{$reservation->user->name}} </td>
                                    <td>
                                        <a href="#show{{$reservation->id}}" data-toggle="modal" class="btn btn-info btn-sm edit btn-flat"><i class='fa fa-edit'></i> Show</a>
                                        <a href="#edit{{$reservation->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$reservation->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach($reservations as $reservation)
@include('includes.edit_delete_reservation')
@include('includes.show_reservation')
@endforeach

@include('includes.add_reservation')

@endsection
