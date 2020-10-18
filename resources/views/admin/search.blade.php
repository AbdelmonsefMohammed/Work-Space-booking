@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Search Room
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Search Room</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="card">
            <div class="card-header">
                Search Room
            </div>
        
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control datetime" type="text" name="start_time" id="start_time" value="{{ request()->input('start_time') }}" placeholder="Start Time" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control datetime" type="text" name="end_time" id="end_time" value="{{ request()->input('end_time') }}" placeholder="End Time" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="type" id="type">
                                    <option >...</option>
                                    <option {{ request()->input('type') == 'meeting_room' ? 'selected' : '' }} value="meeting_room">Meeting room</option>
                                    <option {{ request()->input('type') == 'room' ? 'selected' : '' }} value="room">Room</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                @if($rooms !== null)
                    <hr />
                    @if($rooms->count())
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                                <thead>
                                    <tr>
                                        <th>
                                            Room
                                        </th>
                                        <th>
                                            Capacity
                                        </th>
                                        <th>
                                            Houtly rate
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td class="room-name">
                                                {{ $room->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $room->capacity ?? '' }}
                                            </td>
                                            <td>
                                                {{ $room->hourly_rate ? '$' . number_format($room->hourly_rate, 2) : 'FREE' }}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookRoom" data-room-id="{{ $room->id }}">
                                                    Book Room
                                                </button>
                                            </td>
        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">There are no rooms available at the time you have chosen</p>
                    @endif
                @endif
            </div>
        </div>
        
    </section>
</div>

@include('includes.add_reservation_search')

@endsection

@section('scripts')
<script>
$('#bookRoom').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var roomId = button.data('room-id');
    var modal = $(this);
    modal.find('#room_id').val(roomId);
    modal.find('.modal-title').text('Booking of a room ' + button.parents('tr').children('.room-name').text());

    $('#submitBooking').click(() => {
        modal.find('button[type="submit"]').trigger('click');
    });
});
</script>
@endsection