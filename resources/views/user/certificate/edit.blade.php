@extends('user.dashboard.app')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Certificate</h4>
                    <div class="flex-shrink-0">
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="alert"></div> <!-- Alert will be displayed here -->
                    <div class="live-preview">
                        <form action="{{ route('certificate.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$certificate->id}}" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="hidden"
                                            value="@auth('user'){{ auth()->guard('user')->user()->id }}@endauth"
                                            name="user_id" id="user_id">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Certificate</label>
                                        <input type="file" required class="form-control"
                                            placeholder="Please Upload Image" name="image" id="image">
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
