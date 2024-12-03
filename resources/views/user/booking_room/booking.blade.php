@extends('user.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Room Booking</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    {{-- Form for Booking --}}
                    <h5>Book a Room</h5>
                    <div class="live-preview">
                        <form action="{{ route('store.booking') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" 
                                        value="@auth('user'){{ auth()->guard('user')->user()->id }}@endauth" 
                                        name="user_id" 
                                        id="user_id">
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="room_id" class="form-label">Room Number</label>
                                        <select class="form-control" name="room_id" id="room_id" required>
                                            <option value="" disabled selected>Select a Room</option>
                                            @foreach ($available_rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="bed_selection" style="display: none;">
                                    <div class="mb-3">
                                        <label for="bed_id" class="form-label">Bed Number</label>
                                        <select class="form-control" name="bed_id" id="bed_id">
                                            <option value="" disabled selected>Select a Bed</option>
                                            {{-- Beds will be dynamically loaded via JavaScript --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Booking Date</label>
                                        <input type="date" required class="form-control" name="start_date" id="start_date">
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

@section('script')
    <script>
        document.getElementById('room_id').addEventListener('change', function () {
            const roomId = this.value;

            if (roomId) {
                fetch(`/room/${roomId}/available-beds`)
                    .then(response => response.json())
                    .then(data => {
                        const bedSelect = document.getElementById('bed_id');
                        bedSelect.innerHTML = '<option value="" disabled selected>Select a Bed</option>';

                        if (data.length > 0) {
                            data.forEach(bed => {
                                bedSelect.innerHTML += `<option value="${bed.id}">${bed.bed_number}</option>`;
                            });

                            document.getElementById('bed_selection').style.display = 'block';
                            bedSelect.required = true; // Make bed selection required if beds are available
                        } else {
                            document.getElementById('bed_selection').style.display = 'none';
                            bedSelect.required = false; // Make bed selection optional if no beds are available
                        }
                    })
                    .catch(error => console.error('Error fetching available beds:', error));
            }
        });
    </script>
@endsection
