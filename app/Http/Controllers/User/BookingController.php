<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\UserCertificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function bookingRooms()
    {

        $booked_rooms = Booking::where('status', 'booked')->with('room')->get();
        $booked_room_ids = $booked_rooms->pluck('room_id')->toArray();
        $available_rooms = Room::whereNotIn('id', $booked_room_ids)->get();
        return view('user.booking_room.booking', [
            'booked_rooms' => $booked_rooms,
            'available_rooms' => $available_rooms,
        ]);
    }


    public function storeBooking(Request $request)
    {
        $userId = $request->user_id;


        $userHasPendingCertificate = UserCertificate::where('user_id', $userId)
            ->where('status', '!=', 'approved')
            ->exists();

        if ($userHasPendingCertificate) {
            Alert::error('error', 'Your Certificate is not approved');
            return redirect()->back();
        }
        $userHasRejectedCertificate = UserCertificate::where('user_id', $userId)
            ->where('status', 'rejected')
            ->exists();

        if ($userHasRejectedCertificate) {
            Alert::error('error', 'You cannot book a room as your certificate has been rejected.');

            return redirect()->back()->with('error', 'You cannot book a room as your certificate has been rejected.');
        }

        $user = User::find($userId);
        if (!$user || !$user->is_certificate) {
            Alert::error('error', 'You cannot book a room without an approved certificate.');
            return redirect()->back()->with('error', 'You cannot book a room without an approved certificate.');
        }

        Booking::create([
            'user_id' => $userId,
            'room_id' => $request->room_id,
            'bed_id' => $request->bed_id,
            'start_date' => $request->start_date,
            'status' => 'booked',
        ]);
        alert()->success('Success', 'Room Booked Succesfully');

        return redirect()->back();
    }




    public function showBooked($id)
    {
        $booking = Booking::with(['user', 'bed', 'room'])->where('user_id', $id)->first();

        if (!$booking) {
            alert()->error('Error', 'Booking not found');
            return redirect()->route('user.dashboard');
        }

        return view('user.booking_room.showroom')->with('booking', $booking);
    }



    public function departure($id)
    {

        $booking = Booking::with('user')->find($id);

        if ($booking->status == 'unbooked') {
            alert()->error('Error', 'You already departure from room');
            return redirect()->back();
        }

        if (!$booking) {
            alert()->error('error', 'Booking not found');
            return redirect()->back();
        }

        $endDate = Carbon::now()->format('Y-m-d');
        $booking->update([
            'end_date' => $endDate,
        ]);

        $startDate = Carbon::parse($booking->start_date);
        // Include the start day in the calculation
        $days = $startDate->diffInDays($endDate) + 1; // Add 1 to include the start day

        // Ensure at least 1 day
        $days = $days > 0 ? $days : 1;

        $price = $days * 700;

        $booking->update([
            'price' => $price,
            'status' => 'unbooked',

        ]);

        return view('user.booking_room.showbill', compact('booking', 'days', 'price'));
    }


    public function billInfo($id)
    {
        $booking = Booking::with('user')->with('bed')->with('room')->where('user_id', $id)->where('end_date', '!=', null)->first();
        if (!$booking) {
            alert()->error('Error', 'Booking not found');
            return redirect()->back();
        }
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }


        $startDate = Carbon::parse($booking->start_date);
        $days = $startDate->diffInDays($booking->end_date) + 1;
        $days = $days > 0 ? $days : 1;
        return view('user.booking_room.showbill', compact('booking', 'days'));
    }

    public function downloadBill($id)
    {
        $booking = Booking::with(['user', 'room', 'bed'])->findOrFail($id);

        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($booking->end_date);

        $days = $startDate->diffInDays($endDate) + 1;



        $pdf = Pdf::loadView('user.pdf.bill', compact('booking', 'days'));
        return $pdf->download('booking_bill.pdf');
    }

    public function getAvailableBeds($roomId)
    {
        $available_beds = Bed::where('room_id', $roomId)
            ->where(function ($query) {
                $query->whereDoesntHave('bookings')
                      ->orWhereHas('bookings', function ($query) {
                          $query->where('status', 'unbooked');
                      });
            })
            ->get();
    
        return response()->json($available_beds);
    }
    
}
