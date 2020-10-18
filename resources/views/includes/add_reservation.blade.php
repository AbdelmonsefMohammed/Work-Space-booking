<!-- Add -->
<div class="modal fade" id="addNewReservation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Reservation</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('reservations.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="room_id" class="col-sm-3 control-label">Room</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <select class="form-control timepicker" name="room_id" id="room_id" required>
                                    @foreach($rooms as $id => $room)
                                        <option value="{{ $id }}" {{ old('room_id') == $id ? 'selected' : '' }}>{{ $room }}</option>
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
                                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="title" name="title" value="{{ old('title', '') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="col-sm-3 control-label">Capacity</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="capacity" name="capacity" value="{{ old('capacity', '') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start_time" class="col-sm-3 control-label">Start time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker datetime" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_time" class="col-sm-3 control-label">End time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker datetime" id="end_time" name="end_time" value="{{ old('end_time') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

