<!-- Edit -->
<div class="modal fade" id="edit{{$reservation->id}}">
    <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Update Reservation</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('reservations.update',$reservation->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="room_id" class="col-sm-3 control-label">Room</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <select class="form-control timepicker" name="room_id" id="room_id" required>
                                    @foreach($rooms as $id => $room)
                                        <option value="{{ $id }}" {{ ($reservation->room ? $reservation->room->id : old('room_id')) == $id ? 'selected' : '' }}>{{ $room }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-sm-3 control-label">User</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <select class="form-control timepicker" name="user_id" id="user_id" required>
                                    @foreach($users as $id => $user)
                                        <option value="{{ $id }}" {{ ($reservation->user ? $reservation->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="title" name="title" value="{{ old('title', $reservation->title) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start_time" class="col-sm-3 control-label">Start time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker datetime" id="start_time" name="start_time" value="{{ old('start_time', $reservation->start_time) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_time" class="col-sm-3 control-label">End time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker datetime" id="end_time" name="end_time" value="{{ old('end_time', $reservation->end_time) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3">{{ old('description', $reservation->description) }}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{$reservation->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('reservations.destroy',$reservation->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE SCHEDULE</p>
                        <h2 id="del_schedule" class="bold"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
