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
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Booking Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>

                                        <!-- Booking Status -->
                                        <td>
                                            @if ($user->booking->count() > 0)
                                                @php
                                                    $status = $user->booking->last()->status;  // Get the latest booking status
                                                @endphp
                                                @if ($status == 'booked')
                                                    <span class="badge bg-success">{{ $status }}</span>  <!-- Green badge for 'booked' -->
                                                @elseif ($status == 'unbooked')
                                                    <span class="badge bg-danger">{{ $status }}</span>  <!-- Red badge for 'unbooked' -->
                                                @else
                                                    <span class="badge bg-warning">{{ $status }}</span>  <!-- Yellow badge for other statuses -->
                                                @endif
                                            @else
                                                <span class="badge bg-secondary">No booking</span>  <!-- Grey badge for no booking -->
                                            @endif
                                        </td>
                                        

                                        <td>
                                            <a href="{{ route('user.bill', $user->id) }}" class="btn btn-primary"
                                                data-id="{{ $user->id }}">Show Bill</a>
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
