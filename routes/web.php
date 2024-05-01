<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginCustomerController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\KategoriSparepartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk login admin
Route::get('/login-admin', [LoginAdminController::class, 'showLoginForm'])->middleware('guest:admin')->name('login-admin');
Route::post('/verify-admin', [LoginAdminController::class, 'login'])->name('verify-admin');
Route::post('/logout-admin', [LoginAdminController::class, 'logout'])->name('logout-admin');

// Rute untuk dashboard admin
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Route untuk Control Akun Admin
    Route::get('/dashboard/kontrol-akun-admin', [AdminDashboardController::class, 'KontrolAkunAdmin'])->name('admin.kontrol-akun-admin');
    Route::delete('/dashboard/kontrol-akun-admin/{admin_id}', [AdminDashboardController::class, 'HapusAkunAdmin'])->name('admin.hapus-akun-admin');
    Route::get('/dashboard/kontrol-akun-admin/buat-akun-admin', [AdminDashboardController::class, 'BuatAkunAdmin'])->name('admin.buat-akun-admin');
    Route::post('/dashboard/kontrol-akun-admin/proses-buat-akun-admin', [AdminDashboardController::class, 'ProsesBuatAkunAdmin'])->name('admin.proses-buat-akun-admin');
    Route::get('/dashboard/kontrol-akun-admin/edit_admin/{admin_id}', [AdminDashboardController::class, 'EditAkunAdmin'])->name('admin.edit-akun-admin');
    Route::post('/dashboard/kontrol-akun-admin/ganti-password/{admin_id}', [AdminDashboardController::class, 'GantiPasswordAdmin'])->name('admin.ganti-password-admin');

    // Route untuk Control Akun Customer
    Route::get('/dashboard/kontrol-akun-pengguna', [AdminDashboardController::class, 'KontrolAkunPengguna'])->name('admin.kontrol-akun-pengguna');
    Route::delete('/dashboard/kontrol-akun-pengguna/{customer_id}', [AdminDashboardController::class, 'HapusAkunPengguna'])->name('admin.hapus-akun-pengguna');
    Route::get('/dashboard/kontrol-akun-pengguna/buat-akun-pengguna', [AdminDashboardController::class, 'BuatAkunPengguna'])->name('admin.buat-akun-pengguna');
    Route::post('/dashboard/kontrol-akun-pengguna/proses-buat-akun-pengguna', [AdminDashboardController::class, 'ProsesBuatAkunPengguna'])->name('admin.proses-buat-akun-pengguna');
    Route::get('/dashboard/kontrol-akun-pengguna/edit_pengguna/{customer_id}', [AdminDashboardController::class, 'EditAkunPengguna'])->name('admin.edit-akun-pengguna');
    Route::post('/dashboard/kontrol-akun-pengguna/ganti-password/{customer_id}', [AdminDashboardController::class, 'GantiPasswordPengguna'])->name('admin.ganti-password-pengguna');


    // Rute untuk KategoriSparepart
        Route::get('/kategorisparepart', [KategoriSparepartController::class, 'index'])->name('admin.kategorisparepart.index');
        Route::get('/tambah-kategori', [KategoriSparepartController::class, 'create'])->name('admin.kategorisparepart.tambah-kategori');
        Route::post('/tambah-kategori', [KategoriSparepartController::class, 'store'])->name('admin.kategorisparepart.store');
        Route::delete('/kategorisparepart/{kategorisparepart}', [KategoriSparepartController::class, 'destroy'])->name('admin.kategorisparepart.delete');
        Route::get('/kategorisparepart/{kategorisparepart}/edit', [KategoriSparepartController::class, 'edit'])->name('admin.kategorisparepart.edit');
        Route::put('/kategorisparepart/{kategorisparepart}', [KategoriSparepartController::class, 'update'])->name('admin.kategorisparepart.update');

});


// Rute untuk login customer
Route::get('/', [LoginCustomerController::class, 'showLoginForm']);
Route::get('/login', [LoginCustomerController::class, 'showLoginForm'])->middleware('guest:customer')->name('login-customer');
Route::post('/verify-customer', [LoginCustomerController::class, 'login'])->name('verify-customer');
Route::post('/logout-customer', [LoginCustomerController::class, 'logout'])->name('logout-customer');

// Rute untuk dashboard customer
Route::middleware('auth:customer')->prefix('customer')->group(function () {
    Route::get('/', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');

    // Route untuk Profile customer
    Route::get('/dashboard/profile', [CustomerDashboardController::class, 'Profile'])->name('customer.profile');
    Route::post('/dashboard/profile/ganti-password', [CustomerDashboardController::class, 'GantiPassword'])->name('customer.profile-ganti-password');
});
