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
                     <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="mb-3">
                                     <input type="hidden" value="@auth('user'){{ auth()->guard('user')->user()->id }}@endauth" name="user_id" id="user_id">
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="mb-3">
                                     <label for="image" class="form-label">Certificate</label>
                                     <input type="file" required class="form-control" placeholder="Please Upload Image"
                                         name="image" id="image">
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

 @if (session('success'))
     <script>
         // Display the success message in the #alert div with inline styles
         document.getElementById('alert').innerHTML = `
             <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; border: 1px solid #c3e6cb;">
                 <strong>Success!</strong> {{ session('success') }}
             </div>
         `;
     </script>
 @elseif (session('error'))
     <script>
         // Display the error message in the #alert div with inline styles
         document.getElementById('alert').innerHTML = `
             <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; border: 1px solid #f5c6cb;">
                 <strong>Error!</strong> {{ session('error') }}
             </div>
         `;
     </script>
 @endif

@endsection
