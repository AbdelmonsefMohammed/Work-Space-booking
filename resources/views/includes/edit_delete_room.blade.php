<!-- Edit -->
<div class="modal fade" id="edit{{$room->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Edit Room</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rooms.update',$room->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="name" name="name" value="{{$room->name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <select class="form-control timepicker" name="type" id="type" required>
                                    <option>...</option>
                                    <option <?php if($room->type == 'meeting_room') echo 'selected'; ?> value="meeting_room">Meeting Room</option>
                                    <option <?php if($room->type == 'room') echo 'selected'; ?> value="room">Room</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="col-sm-3 control-label">Capacity</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="capacity" name="capacity" value="{{$room->capacity}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hourly_rate" class="col-sm-3 control-label">Hourly Rate</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="hourly_rate" name="hourly_rate" value="{{$room->hourly_rate}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="over_capacity" class="col-sm-3 control-label">Charge extra for more than</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="over_capacity" name="over_capacity" value="{{$room->over_capacity}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="extra_price" class="col-sm-3 control-label">Extra price</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="extra_price" name="extra_price" value="{{$room->extra_price}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">description</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <textarea name="description" id="description" cols=52" rows="3">{{$room->description}}</textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{$room->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id">Delete Room</span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rooms.destroy',$room->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <p>DELETE ROOM</p>
                        <h2 class="bold del_employee_name"></h2>
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
