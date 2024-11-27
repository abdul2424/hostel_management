@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hostel Admin</a></li>
                            <li class="breadcrumb-item active">Reserved Room</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Reserve Room</h5>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Room Number</th>
                                    <th>Booking Date</th>
                                    <th>Departure Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $key => $booking)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->user->email }}</td>
                                        <td>{{ $booking->room->room_number }}</td>
                                        <td>{{ $booking->start_date }}</td>
                                        <td>
                                            @if (is_null($booking->end_date))
                                                <span class="badge bg-warning">Continue</span>
                                            @else
                                                {{ $booking->end_date }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (is_null($booking->price))
                                                <span class="badge bg-warning">Continue</span>
                                            @else
                                                {{ $booking->price }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($booking->status === 'booked')
                                                <span class="badge bg-success">Booked</span>
                                            @elseif ($booking->status === 'unbooked')
                                                <span class="badge bg-danger">Unbooked</span>
                                            @else
                                                {{ ucfirst($booking->status) }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.room.departure', $booking->id) }}"
                                                class="btn btn-danger" data-id="{{ $booking->id }}">Departure</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection
