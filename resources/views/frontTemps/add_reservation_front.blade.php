<div class="modal" tabindex="-1" role="dialog" id="bookRoom" style="margin-top: 5%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Booking of a room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cart.store') }}" method="POST" id="bookingForm">
                    @csrf
                    <input type="hidden" name="room_id" id="room_id" value="{{ old('room_id') }}">
                    <input type="hidden" name="start_time" value="{{ request()->input('start_time') }}">
                    <input type="hidden" name="end_time" value="{{ request()->input('end_time') }}">
                    <div class="form-group">
                        <label class="required" for="title">Title</label>
                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                    @if (isset($_GET['type']) && $_GET['type'] == 'meeting_room')
                    <div class="form-group">
                        <label class="required" for="capacity">Capacity</label>
                        <input class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" type="number" name="capacity" id="capacity" value="{{ old('capacity', '') }}" required>
                        @if($errors->has('capacity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('capacity') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                    <button type="submit" style="display: none;"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitBooking">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>