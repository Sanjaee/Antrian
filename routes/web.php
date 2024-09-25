<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('qrcode');
});
// Route untuk menampilkan QR Code
Route::get('/qrcode', [QueueController::class, 'showQRCode'])->name('qrcode');

// Route untuk Form Pengambilan Tiket
Route::get('/ambil-tiket', [QueueController::class, 'showFormPengambilanTiket'])->name('ambil-tiket.form');
Route::post('/ambil-tiket', [QueueController::class, 'submitFormPengambilanTiket'])->name('ambil-tiket.submit');

// Route untuk input data customer baru
Route::get('/customer/create', [QueueController::class, 'showFormInputCustomerData'])->name('customer.create');
Route::post('/customer/create', [QueueController::class, 'submitCustomerData'])->name('customer.submit');

// Route untuk Admin
Route::middleware('auth')->group(function () {
    // Form Pemanggilan Antrian
    Route::get('/panggil-antrian', [QueueController::class, 'showFormPemanggilanAntrian'])->name('panggil-antrian.form');
    Route::post('/panggil-antrian', [QueueController::class, 'submitFormPemanggilanAntrian'])->name('panggil-antrian.submit');

    // Laporan Rekap
    Route::get('/laporan', [QueueController::class, 'showLaporan'])->name('laporan');
   
    // Data Customers
    Route::get('/data-customers', [QueueController::class, 'showCustomers'])->name('data.customers');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route untuk Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');










