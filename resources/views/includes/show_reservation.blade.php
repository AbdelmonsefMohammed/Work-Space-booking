<!-- Edit -->
<div class="modal fade" id="show{{$reservation->id}}">
    <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Show Reservation</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="room_id" class="col-sm-3 control-label">Room</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="room_id" name="room_id" value="{{ $reservation->room->name }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-sm-3 control-label">User</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="user_id" name="user_id" value="{{ $reservation->user->name }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="title" name="title" value="{{ $reservation->title }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start_time" class="col-sm-3 control-label">Start time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="start_time" name="start_time" value="{{$reservation->start_time}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_time" class="col-sm-3 control-label">End time</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="end_time" name="end_time" value="{{$reservation->end_time}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3" disabled>{{$reservation->description}}</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </form>
            </div>
        </div>
    </div>
</div>