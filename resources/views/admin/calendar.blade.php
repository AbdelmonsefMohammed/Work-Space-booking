@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Calendar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')
        <div class="card">
        <div class="card-body">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
            <form>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="room_id">Room</label>
                            <select class="form-control select2" name="room_id" id="room_id">
                                @foreach($rooms as $id => $room)
                                    <option value="{{ $id }}" {{ request()->input('room_id') == $id ? 'selected' : '' }}>{{ $room }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ request()->input('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary mt-4">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
    
            <div id='fullcalendar'></div>
        </div>
        </div>
        </section>
</div>
{{-- @foreach( $employees as $employee)
@include('includes.edit_delete_employee')
@endforeach

@include('includes.add_employee') --}}

@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#fullcalendar').fullCalendar({
                // put your options and callbacks here
                events: events,


            })
        });
</script>
@stop
