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

    // Route untuk Control Akun
    Route::get('/dashboard/kontrol-pengguna', [AdminDashboardController::class, 'KontrolPengguna'])->name('admin.kontrol-pengguna');
    Route::delete('/dashboard/kontrol-pengguna/{customer_id}', [AdminDashboardController::class, 'HapusAkun'])->name('admin.hapus-akun');


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
});