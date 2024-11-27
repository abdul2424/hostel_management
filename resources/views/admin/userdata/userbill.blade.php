@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Start Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hostel</a></li>
                            <li class="breadcrumb-item active">Bill</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Booking Details</h5>
                    </div>
                    <div class="card">

                        <div class="card-body">
                            @if ($booking)
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-primary mb-3">User Information</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>Name:</strong> {{ $booking->user->name }}
                                            </li>
                                            <li class="list-group-item"><strong>Email:</strong> {{ $booking->user->email }}
                                            </li>
                                            <li class="list-group-item"><strong>Phone:</strong> {{ $booking->user->phone }}
                                            </li>
                                            <li class="list-group-item"><strong>Address:</strong>
                                                {{ $booking->user->address }}</li>
                                            <li class="list-group-item"><strong>Occupation:</strong>
                                                {{ $booking->user->occupation }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-primary mb-3">Room Information</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>Room Number:</strong>
                                                {{ $booking->room->room_number }}</li>
                                            <li class="list-group-item"><strong>Start Date:</strong>
                                                {{ $booking->start_date }}</li>
                                            <li class="list-group-item"><strong>End Date:</strong> {{ $booking->end_date }}
                                            </li>
                                            <li class="list-group-item"><strong>Total Days:</strong> {{ $days }}
                                            </li>
                                            <li class="list-group-item"><strong>Amount:</strong>{{ $booking->price }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <p class="text-center text-danger">No booking details found.</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        @if ($booking)
                            <a href="{{ route('user.bill.download', $booking->id) }}" class="btn btn-primary">
                                Download Bill
                            </a>
                        @endif
                    </div>

                </div>
            </div><!-- End Col -->
        </div><!-- End Row -->

    </div>
@endsection
