<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\CertificateController;
use Illuminate\Support\Facades\Route;

Route::view('/admin/login', 'admin.login')->name('admin');
Route::post('/adminlogin', [AuthController::class, 'login'])->name('admin.login');
Route::middleware(['admin'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout/page');
    Route::view('/admin/dashboard', 'admin.layouts.app')->name('admin.dashboard');
    Route::get('/dashboard/admin', [UserController::class, 'dashboard'])->name('dashboard');

    // room
    Route::view('/create/room', 'admin.room.create')->name('admin.roomcreate');
    Route::post('store/room', [RoomController::class, 'store'])->name('admin.room.store');
    Route::get('room/index', [RoomController::class, 'show'])->name('admin.room.index');
    Route::get('/room/delete/{id}', [RoomController::class, 'delete'])->name('room.number.delete');
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::post('/room/update', [RoomController::class, 'update'])->name('room.update');

    // bed
    Route::get('/store-bed', [RoomController::class, 'create'])->name('store.bed.form');
    Route::post('/store-bed', [RoomController::class, 'storeBed'])->name('store.bed');
    Route::get('/bed-list', [RoomController::class, 'index'])->name('bed.list');
    Route::get('/bed/delete/{id}', [RoomController::class, 'destroy'])->name('bed.delete');

    // users
    Route::get('/user/index', [UserController::class, 'showUser'])->name('user.index');
    Route::get('/certificate', [UserController::class, 'userCertificate'])->name('user.certificate');

    Route::get('/accept/certificate/{id}', [UserController::class, 'acceptCertificate'])->name('certificate.accept');
    Route::get('/reject/certificate/{id}', [UserController::class, 'rejectCertificate'])->name('certificate.reject');

    // room
    Route::get('/get/all/bookings', [UserController::class, 'showBooking'])->name('showbookings');
    Route::get('/user/departure/{id}', [RoomReservationController::class, 'userDeparture'])->name('user.room.departure');
    Route::get('/user/data', [RoomReservationController::class, 'userData'])->name('user.data');
    Route::get('/user/bill/{id}', [RoomReservationController::class, 'userBillInfo'])->name('user.bill');
    Route::get('/download/userbill/{id}', [RoomReservationController::class, 'downloadUserBill'])->name('user.bill.download');
});

Route::view('/', 'user.layouts.app')->name('user.web');
Route::view('/user/login', 'user.auth.login')->name('user.login');
Route::view('/signup/page', 'user.auth.signup')->name('user.signup');
Route::post('/user/store', [UserAuthController::class, 'storeUser'])->name('user.store');
Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::view('/forget/password', 'user.auth.forgetPassword')->name('forgetpassword');
Route::post('/store/otp', [UserAuthController::class, 'forgetPassword'])->name('store.otp');
Route::post('/verify/password', [UserAuthController::class, 'verifyOtp'])->name('verifytp');
Route::post('/update/password', [UserAuthController::class, 'forgetupdatePassword'])->name('update.password');

Route::middleware(['auth:user'])->group(function () {
    Route::get('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
    Route::view('/dashboard', 'user.content.content')->name('user.dashboard');
    Route::get('/user/edit/{id}', [UserAuthController::class, 'edit'])->name('user.edit');
    Route::post('user/profile/update', [UserAuthController::class, 'update'])->name('user.update');

    // certificate
    Route::view('/store/certificate', 'user.certificate.create')->name('user.certifictae');
    Route::post('/certificate', [CertificateController::class, 'storeImage'])->name('image.store');

    Route::get('/booking', [BookingController::class, 'bookingRooms'])->name('user.booking');
    Route::post('/store/booking', [BookingController::class, 'storeBooking'])->name('store.booking');
    Route::get('/booked/room/{id}', [BookingController::class, 'showBooked'])->name('booked_room');
    Route::get('/departure/room/{id}', [BookingController::class, 'departure'])->name('room.departure');
    Route::get('/reserved-room', [BookingController::class, 'reservedRoom'])->name('reserved_room');
    // bill info

    Route::get('/billinfo/{id}', [BookingController::class, 'billInfo'])->name('bill.info');
    Route::get('/download-bill/{id}', [BookingController::class, 'downloadBill'])->name('download.bill');
    Route::get('/certificate/edit/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::post('/certificate.update', [CertificateController::class, 'update'])->name('certificate.update');

    Route::get('/room/{id}/available-beds', [BookingController::class, 'getAvailableBeds']);
});
