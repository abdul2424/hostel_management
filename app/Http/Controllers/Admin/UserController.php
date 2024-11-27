<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\UserCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser()
    {
        $users = User::all();
        return view('admin.userdata.index')->with('users', $users);
    }

    public function userCertificate()
    {
        $certificates = UserCertificate::with('user')->get();
        return view('admin.userdata.certificate')->with('certificates', $certificates);
    }

    public function acceptCertificate($id)
    {
        $certificate = UserCertificate::findOrFail($id);

        $certificate->update([
            'status' => 'approved',
        ]);

        $certificate->user()->update([
            'is_certificate' => true,
        ]);
        alert()->success('Success', 'Certificate Approved');
        return redirect()->back();
    }

    public function rejectCertificate($id)
    {
        $certificate = UserCertificate::findOrFail($id);


        $certificate->update([
            'status' => 'rejected',
        ]);
        $certificate->user()->update([
            'is_certificate' => true,
        ]);
        alert()->success('Success', 'Certificate Reject');
        return redirect()->back();
    }


    public function showBooking()
    {
        $bookings = Booking::with('user')->with('room')->get();
        return view('admin.userdata.showbooking')->with('bookings', $bookings);
    }

    public function dashboard()
    {

        $totalUsers = User::count();


        $totalBookedRooms = Room::whereHas('booking', function ($query) {
            $query->where('status', 'booked');
        })->count();

        $totalUnbookedRooms = Room::whereDoesntHave('booking', function ($query) {
            $query->where('status', '!=', 'unbooked');
        })->count();



        $totalUnbookedAmount = Room::whereHas('booking', function ($query) {
            $query->where('status', 'unbooked')
                ->whereNotNull('start_date')
                ->whereNotNull('end_date');
        })
            ->get()
            ->sum(function ($room) {
                // For each room, get the last booking with status 'unbooked'
                $lastBooking = $room->booking()->where('status', 'unbooked')->latest()->first();
                if ($lastBooking && $lastBooking->start_date && $lastBooking->end_date) {
                    $startDate = Carbon::parse($lastBooking->start_date);
                    $endDate = Carbon::parse($lastBooking->end_date);

                    // Calculate the difference in days between start_date and end_date, including the start date in the count
                    return $startDate->diffInDays($endDate->addDay()) * 700;
                }
                return 0;
            });

        return view('admin.layouts.content', compact('totalUsers', 'totalBookedRooms', 'totalUnbookedRooms', 'totalUnbookedAmount'));
    }
}
