@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payments
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Payments</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Payment Method</th>
                                <th>User name</th>
                                <th>Payment Amount</th>
                                <th>Reserved Rooms</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td> {{$payment->id}} </td>
                                    <td> {{$payment->payment_method}} </td>
                                    <td> {{$payment->user->name}} </td>
                                    <td> {{'$' . number_format($payment->payment_total, 2)}} </td>
                                    <td>
                                        @foreach ($payment->rooms as $room)
                                            {{$room->name}}
                                        @endforeach
                                    </td>
                                    <td> {{$payment->created_at}} </td>

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


@endsection
