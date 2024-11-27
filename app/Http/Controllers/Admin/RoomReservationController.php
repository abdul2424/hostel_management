<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomReservationController extends Controller
{
    public function userDeparture($id)
    {
        
        $booking = Booking::with('user')->find($id);

        if ($booking->status == 'unbooked') {
            Alert::error('Error', 'Departure Already');
            return redirect()->back();
        }

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        $endDate = Carbon::now()->format('Y-m-d');
        $booking->update([
            'end_date' => $endDate,
        ]);

        $startDate = Carbon::parse($booking->start_date);

        $days = $startDate->diffInDays($endDate) + 1;
        $days = $days > 0 ? $days : 1;

        $price = $days * 700;

        $booking->update([
            'price' => $price,
            'status' => 'unbooked',
        ]);

        return view('admin.userdata.userbill', compact('booking', 'days', 'price'));
    }

    public function userBillInfo($id)
    {
        $booking = Booking::with('user')->with('room')->where('user_id', $id)->where('end_date', '!=', null)->first();
        if (!$booking) {
            Alert::error('error', 'User not book any room');
        }


        $startDate = Carbon::parse($booking->start_date);
        $days = $startDate->diffInDays($booking->end_date) + 1;
        $days = $days > 0 ? $days : 1;
        return view('admin.userdata.userbill', compact('booking', 'days'));
    }

    public function userData()
    {
        $users = User::with('booking')->get();
        return view('admin.userdata.userdata')->with('users', $users);
    }

    public function downloadUserBill($id)
    {
        $booking = Booking::with(['user', 'room'])->findOrFail($id);

        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($booking->end_date);

        $days = $startDate->diffInDays($endDate) + 1;



        $pdf = Pdf::loadView('user.pdf.bill', compact('booking', 'days'));
        return $pdf->download('booking_bill.pdf');
    }
}
