@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Room Number</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="live-preview">
                        <form action="{{ route('room.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $room->id }}" name="id">
                            <div class="row">
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="room_number" class="form-label">Name</label>
                                        <input type="text" required value="{{ $room->room_number }}" class="form-control"
                                            placeholder="Enter Room Number" name="room_number" id="room_number">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->


    </div>
@endsection
