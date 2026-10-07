<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\BookingServisController;
use App\Http\Controllers\OrderSparePartController;
use App\Http\Controllers\HomeServisController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\PenugasanTeknisiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCabangController;
use App\Http\Controllers\OperasionalCabangController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\KategoriSparePartController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\LayananServisController;
use App\Http\Controllers\DetailServisController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\MontirLapanganController;


// ======================================================
// AUTHENTICATION
// ======================================================

Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


// ======================================================
// DASHBOARD
// SEMUA ROLE
// ======================================================

Route::middleware('role:1,2,3,4,5')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

});


// ======================================================
// SUPER ADMIN
// ROLE 1
// ======================================================

Route::middleware('role:1')->group(function () {

    // USER
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    // ROLE
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/role/create', [RoleController::class, 'create']);
    Route::post('/role', [RoleController::class, 'store']);
    Route::get('/role/{id}/edit', [RoleController::class, 'edit']);
    Route::put('/role/{id}', [RoleController::class, 'update']);
    Route::delete('/role/{id}', [RoleController::class, 'destroy']);

    // ADMIN CABANG
    Route::get('/admincabang', [AdminCabangController::class, 'index']);
    Route::get('/admincabang/create', [AdminCabangController::class, 'create']);
    Route::post('/admincabang', [AdminCabangController::class, 'store']);
    Route::get('/admincabang/{id}/edit', [AdminCabangController::class, 'edit']);
    Route::put('/admincabang/{id}', [AdminCabangController::class, 'update']);
    Route::delete('/admincabang/{id}', [AdminCabangController::class, 'destroy']);

});


// ======================================================
// SUPER ADMIN + ADMIN CABANG
// ROLE 1, 2
// ======================================================

Route::middleware('role:1,2')->group(function () {

    // PELANGGAN
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/create', [PelangganController::class, 'create']);
    Route::post('/pelanggan', [PelangganController::class, 'store']);
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);

    // KENDARAAN
    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/kendaraan/create', [KendaraanController::class, 'create']);
    Route::post('/kendaraan', [KendaraanController::class, 'store']);
    Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit']);
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy']);

    // CABANG
    Route::get('/cabang', [CabangController::class, 'index']);
    Route::get('/cabang/create', [CabangController::class, 'create']);
    Route::post('/cabang', [CabangController::class, 'store']);
    Route::get('/cabang/{id}/edit', [CabangController::class, 'edit']);
    Route::put('/cabang/{id}', [CabangController::class, 'update']);
    Route::delete('/cabang/{id}', [CabangController::class, 'destroy']);

    // TEKNISI
    Route::get('/teknisi', [TeknisiController::class, 'index']);
    Route::get('/teknisi/create', [TeknisiController::class, 'create']);
    Route::post('/teknisi', [TeknisiController::class, 'store']);
    Route::get('/teknisi/{id}/edit', [TeknisiController::class, 'edit']);
    Route::put('/teknisi/{id}', [TeknisiController::class, 'update']);
    Route::delete('/teknisi/{id}', [TeknisiController::class, 'destroy']);

    // MONTIR LAPANGAN
    Route::get('/montirlapangan', [MontirLapanganController::class, 'index']);
    Route::get('/montirlapangan/create', [MontirLapanganController::class, 'create']);
    Route::post('/montirlapangan', [MontirLapanganController::class, 'store']);
    Route::get('/montirlapangan/{id}/edit', [MontirLapanganController::class, 'edit']);
    Route::put('/montirlapangan/{id}', [MontirLapanganController::class, 'update']);
    Route::delete('/montirlapangan/{id}', [MontirLapanganController::class, 'destroy']);

    // OPERASIONAL CABANG
    Route::get('/operasional', [OperasionalCabangController::class, 'index']);
    Route::get('/operasional/create', [OperasionalCabangController::class, 'create']);
    Route::post('/operasional', [OperasionalCabangController::class, 'store']);
    Route::get('/operasional/{id}/edit', [OperasionalCabangController::class, 'edit']);
    Route::put('/operasional/{id}', [OperasionalCabangController::class, 'update']);
    Route::delete('/operasional/{id}', [OperasionalCabangController::class, 'destroy']);

    // SPARE PART
    Route::get('/sparepart', [SparePartController::class, 'index']);
    Route::get('/sparepart/create', [SparePartController::class, 'create']);
    Route::post('/sparepart', [SparePartController::class, 'store']);
    Route::get('/sparepart/{id}/edit', [SparePartController::class, 'edit']);
    Route::put('/sparepart/{id}', [SparePartController::class, 'update']);
    Route::delete('/sparepart/{id}', [SparePartController::class, 'destroy']);

    // KATEGORI SPARE PART
    Route::get('/kategori-sparepart', [KategoriSparePartController::class, 'index']);
    Route::get('/kategori-sparepart/create', [KategoriSparePartController::class, 'create']);
    Route::post('/kategori-sparepart', [KategoriSparePartController::class, 'store']);
    Route::get('/kategori-sparepart/{id}/edit', [KategoriSparePartController::class, 'edit']);
    Route::put('/kategori-sparepart/{id}', [KategoriSparePartController::class, 'update']);
    Route::delete('/kategori-sparepart/{id}', [KategoriSparePartController::class, 'destroy']);

    // ORDER SPARE PART
    Route::get('/order', [OrderSparePartController::class, 'index']);
    Route::get('/order/create', [OrderSparePartController::class, 'create']);
    Route::post('/order', [OrderSparePartController::class, 'store']);
    Route::get('/order/{id}/edit', [OrderSparePartController::class, 'edit']);
    Route::put('/order/{id}', [OrderSparePartController::class, 'update']);
    Route::delete('/order/{id}', [OrderSparePartController::class, 'destroy']);

    // ORDER DETAIL
    Route::get('/orderdetail', [OrderDetailController::class, 'index']);
    Route::get('/orderdetail/create', [OrderDetailController::class, 'create']);
    Route::post('/orderdetail', [OrderDetailController::class, 'store']);
    Route::get('/orderdetail/{id}/edit', [OrderDetailController::class, 'edit']);
    Route::put('/orderdetail/{id}', [OrderDetailController::class, 'update']);
    Route::delete('/orderdetail/{id}', [OrderDetailController::class, 'destroy']);

    // PENGIRIMAN
    Route::get('/pengiriman', [PengirimanController::class, 'index']);
    Route::get('/pengiriman/create', [PengirimanController::class, 'create']);
    Route::post('/pengiriman', [PengirimanController::class, 'store']);
    Route::get('/pengiriman/{id}/edit', [PengirimanController::class, 'edit']);
    Route::put('/pengiriman/{id}', [PengirimanController::class, 'update']);
    Route::delete('/pengiriman/{id}', [PengirimanController::class, 'destroy']);

    // EKSPEDISI
    Route::get('/ekspedisi', [EkspedisiController::class, 'index']);
    Route::get('/ekspedisi/create', [EkspedisiController::class, 'create']);
    Route::post('/ekspedisi', [EkspedisiController::class, 'store']);
    Route::get('/ekspedisi/{id}/edit', [EkspedisiController::class, 'edit']);
    Route::put('/ekspedisi/{id}', [EkspedisiController::class, 'update']);
    Route::delete('/ekspedisi/{id}', [EkspedisiController::class, 'destroy']);

    // METODE PEMBAYARAN
    Route::get('/metodepembayaran', [MetodePembayaranController::class, 'index']);
    Route::get('/metodepembayaran/create', [MetodePembayaranController::class, 'create']);
    Route::post('/metodepembayaran', [MetodePembayaranController::class, 'store']);
    Route::get('/metodepembayaran/{id}/edit', [MetodePembayaranController::class, 'edit']);
    Route::put('/metodepembayaran/{id}', [MetodePembayaranController::class, 'update']);
    Route::delete('/metodepembayaran/{id}', [MetodePembayaranController::class, 'destroy']);

    // PROMO
    Route::get('/promo', [PromoController::class, 'index']);
    Route::get('/promo/create', [PromoController::class, 'create']);
    Route::post('/promo', [PromoController::class, 'store']);
    Route::get('/promo/{id}/edit', [PromoController::class, 'edit']);
    Route::put('/promo/{id}', [PromoController::class, 'update']);
    Route::delete('/promo/{id}', [PromoController::class, 'destroy']);

});


// ======================================================
// SUPER ADMIN + ADMIN CABANG + PETUGAS SERVICE
// ROLE 1, 2, 3
// ======================================================

Route::middleware('role:1,2,3')->group(function () {

    // BOOKING SERVIS
    Route::get('/booking', [BookingServisController::class, 'index']);
    Route::get('/booking/create', [BookingServisController::class, 'create']);
    Route::post('/booking', [BookingServisController::class, 'store']);
    Route::get('/booking/{id}/edit', [BookingServisController::class, 'edit']);
    Route::put('/booking/{id}', [BookingServisController::class, 'update']);
    Route::delete('/booking/{id}', [BookingServisController::class, 'destroy']);

    // LAYANAN SERVIS
    Route::get('/layanan', [LayananServisController::class, 'index']);
    Route::get('/layanan/create', [LayananServisController::class, 'create']);
    Route::post('/layanan', [LayananServisController::class, 'store']);
    Route::get('/layanan/{id}/edit', [LayananServisController::class, 'edit']);
    Route::put('/layanan/{id}', [LayananServisController::class, 'update']);
    Route::delete('/layanan/{id}', [LayananServisController::class, 'destroy']);

    // DETAIL SERVIS
    Route::get('/detailservis', [DetailServisController::class, 'index']);
    Route::get('/detailservis/create', [DetailServisController::class, 'create']);
    Route::post('/detailservis', [DetailServisController::class, 'store']);
    Route::get('/detailservis/{id}/edit', [DetailServisController::class, 'edit']);
    Route::put('/detailservis/{id}', [DetailServisController::class, 'update']);
    Route::delete('/detailservis/{id}', [DetailServisController::class, 'destroy']);

    // PENUGASAN TEKNISI
    Route::get('/penugasan', [PenugasanTeknisiController::class, 'index']);
    Route::get('/penugasan/create', [PenugasanTeknisiController::class, 'create']);
    Route::post('/penugasan', [PenugasanTeknisiController::class, 'store']);
    Route::get('/penugasan/{id}/edit', [PenugasanTeknisiController::class, 'edit']);
    Route::put('/penugasan/{id}', [PenugasanTeknisiController::class, 'update']);
    Route::delete('/penugasan/{id}', [PenugasanTeknisiController::class, 'destroy']);

    // PEMBAYARAN
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::post('/pembayaran', [PembayaranController::class, 'store']);
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit']);
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

    // RATING
    Route::get('/rating', [RatingController::class, 'index']);
    Route::get('/rating/create', [RatingController::class, 'create']);
    Route::post('/rating', [RatingController::class, 'store']);
    Route::get('/rating/{id}/edit', [RatingController::class, 'edit']);
    Route::put('/rating/{id}', [RatingController::class, 'update']);
    Route::delete('/rating/{id}', [RatingController::class, 'destroy']);

});


// ======================================================
// SUPER ADMIN + ADMIN CABANG + TEKNISI + MONTIR
// ROLE 1, 2, 4, 5
// ======================================================

Route::middleware('role:1,2,4,5')->group(function () {

    // HOME SERVIS
    Route::get('/homeservice', [HomeServisController::class, 'index']);
    Route::get('/homeservice/create', [HomeServisController::class, 'create']);
    Route::post('/homeservice', [HomeServisController::class, 'store']);
    Route::get('/homeservice/{id}/edit', [HomeServisController::class, 'edit']);
    Route::put('/homeservice/{id}', [HomeServisController::class, 'update']);
    Route::delete('/homeservice/{id}', [HomeServisController::class, 'destroy']);

});


// ======================================================
// SUPER ADMIN + TEKNISI + MONTIR
// ROLE 1, 4, 5
// ======================================================

Route::middleware('role:1,4,5')->group(function () {

    // SPARE PART UNTUK TEKNISI/MONTIR
    // Hanya lihat data
    Route::get('/sparepart/lihat', [SparePartController::class, 'index']);

});


// ======================================================
// TEKNISI + MONTIR
// ROLE 1, 4, 5
// ======================================================

Route::middleware('role:1,4,5')->group(function () {

    // PENUGASAN - lihat data
    Route::get('/penugasan/lihat', [PenugasanTeknisiController::class, 'index']);

});
