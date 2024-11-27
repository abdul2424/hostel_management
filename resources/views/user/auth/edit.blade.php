@extends('user.dashboard.dashboard')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">User</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="live-preview">
                        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <div class="row">
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" required value="{{ $user->name }}" class="form-control"
                                            placeholder="Enter Name" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" required value="{{ $user->email }}" class="form-control"
                                            placeholder="Enter Email" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" required value="{{ $user->phone }}" class="form-control"
                                            placeholder="Enter phone Number" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" required value="{{ $user->address }}" class="form-control"
                                            placeholder="Enter address" name="address" id="address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="occupation" class="form-label">Occupation</label>
                                        <input type="text" required value="{{ $user->occupation }}" class="form-control"
                                            placeholder="Enter occupation" name="occupation" id="occupation">
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
