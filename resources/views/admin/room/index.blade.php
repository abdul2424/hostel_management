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
                            <li class="breadcrumb-item active">Room Number</li>
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
                        <h5 class="card-title mb-0">Room Number</h5>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Room Number</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $key => $room)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $room->room_number }}</td>
                                        <td><a href="{{ route('room.number.delete', $room->id) }}" class="btn btn-danger "
                                                data-id="1">Delete</a></td>
                                        <td><a href="{{ route('room.edit', $room->id) }}" class="btn btn-primary "
                                                data-id="1">Update</a></td>
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
