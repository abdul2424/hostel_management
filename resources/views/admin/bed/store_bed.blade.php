@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Store Bed</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('store.bed') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="room_id" class="form-label">Room Number</label>
                                        <select class="form-control" name="room_id" id="room_id" required>
                                            <option value="" disabled selected>Select a Room</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="bed_number" class="form-label">Bed Number</label>
                                        <input type="text" class="form-control" name="bed_number" id="bed_number" required placeholder="Enter Bed Number">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
