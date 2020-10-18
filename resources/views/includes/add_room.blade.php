<!-- Add -->
<div class="modal fade" id="addNewRoom">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Room</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('rooms.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <select class="form-control timepicker" name="type" id="type" required>
                                    <option>...</option>
                                    <option value="meeting_room">Meeting Room</option>
                                    <option value="room">Room</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="col-sm-3 control-label">Capacity</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="capacity" name="capacity" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hourly_rate" class="col-sm-3 control-label">Hourly Rate</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="hourly_rate" name="hourly_rate" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="over_capacity" class="col-sm-3 control-label">Charge extra for more than</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="over_capacity" name="over_capacity">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="extra_price" class="col-sm-3 control-label">Extra price</label>

                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <input type="number" class="form-control timepicker" id="extra_price" name="extra_price">
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

