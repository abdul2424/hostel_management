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
                        <h5 class="card-title mb-0">Bed Numbers</h5>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Room Number</th>
                                    <th>Bed Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beds as $key => $bed)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $bed->room->room_number }}</td>
                                        <td>{{ $bed->bed_number }}</td>
                                        <td>
                                            <a href="{{ route('bed.delete', $bed->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this bed?');">
                                                Delete
                                            </a>
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
