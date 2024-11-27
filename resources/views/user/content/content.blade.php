@extends('user.dashboard.app')
@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h1 class="card-title mb-0 flex-grow-1">Welcome @auth('user')
                            {{ auth()->guard('user')->user()->name }}
                        @endauth
                    </h1>
                    <div class="flex-shrink-0">
                        @auth('user')
                            <a href="{{ route('user.edit', auth()->guard('user')->user()->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        @endauth
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    @auth('user')
                        @php
                            $user = auth()->guard('user')->user();
                        @endphp
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                            <li class="list-group-item"><strong>Occupation:</strong> {{ $user->occupation }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
                        </ul>
                    @else
                        <p>No authenticated user data available.</p>
                    @endauth
                </div><!-- end card body -->
                <div class="card-body">
                    <h4>Certificate</h4>
                    @auth('user')
                        @php
                            $user = auth()->guard('user')->user();
                            $certificates = $user->certificate; // Retrieve all certificates
                        @endphp
                        @if ($certificates->isEmpty())
                            <p>No certificates available.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($certificates as $certificate)
                                    <li class="list-group-item">
                                        <strong>Status:</strong> {{ $certificate->status }}

                                        @if ($certificate->image)
                                            <strong>Certificate:</strong>
                                            <a class="image-popup" href="{{ asset($certificate->image) }}"
                                                title="Certificate Image">
                                                <img src="{{ asset($certificate->image) }}" alt="certificate_image"
                                                    height="80px" width="80px">
                                            </a>
                                        @else
                                            <p>No image available for this certificate.</p>
                                        @endif

                                        <!-- Edit Button -->
                                        <a href="{{ route('certificate.edit', $certificate->id) }}"
                                            class="btn btn-primary btn-sm mt-2">
                                            Edit
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        <p>No authenticated user data available.</p>
                    @endauth
                </div>



            </div>
        </div> <!-- end col -->
    </div>
@endsection
