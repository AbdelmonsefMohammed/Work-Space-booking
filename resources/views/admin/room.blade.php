@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rooms
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Rooms</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addNewRoom" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th> Name </th>
                                <th>Type</th>
                                <th>Capacity</th>
                                <th>Hourly rate</th>
                                <th>Extra price</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr>
                                    <td> {{$room->name}} </td>
                                    <td> {{$room->type}} </td>
                                    <td> {{$room->capacity}} </td>
                                    <td> {{'$' . number_format($room->hourly_rate, 2)}} </td>
                                    <td> {{'$' . number_format($room->extra_price, 2)}} </td>
                                    <td>

                                        <a href="#edit{{$room->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$room->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>

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

@foreach($rooms as $room)
@include('includes.edit_delete_room')
@endforeach

@include('includes.add_room')

@endsection
