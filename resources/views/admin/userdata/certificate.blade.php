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
                            <li class="breadcrumb-item active">User certificate</li>
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
                        <h5 class="card-title mb-0">User certificate</h5>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $key => $certificate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $certificate->user->name }}</td>
                                        <td>
                                            @if ($certificate->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif ($certificate->status === 'rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="image-popup" href="{{ asset($certificate->image) }}" title="">
                                                <img src="{{ asset($certificate->image) }}" alt="certificate" height="80px"
                                                    width="80px">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('certificate.accept', $certificate->id) }}"
                                                class="btn btn-primary">Accept</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('certificate.reject', $certificate->id) }}"
                                                class="btn btn-danger">Reject</a>
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
