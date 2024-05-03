<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginCustomerController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CategoryController;

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

    // Route untuk Profile Admin
    Route::get('/dashboard/profile', [AdminController::class, 'profileAdmin'])->name('admin.profile-admin');

    // Route untuk Control Akun Admin
    Route::get('/dashboard/kontrol-akun-admin', [AdminController::class, 'indexAdmin'])->name('admin.control-admin.index');
    Route::delete('/dashboard/kontrol-akun-admin/{admin_id}', [AdminController::class, 'deleteAdmin'])->name('admin.control-admin.delete');
    Route::get('/dashboard/kontrol-akun-admin/buat-akun', [AdminController::class, 'createAdmin'])->name('admin.control-admin.create');
    Route::post('/dashboard/kontrol-akun-admin/buat-akun', [AdminController::class, 'storeAdmin'])->name('admin.control-admin.store');
    Route::get('/dashboard/kontrol-akun-admin/edit-akun/{admin_id}', [AdminController::class, 'editAdmin'])->name('admin.control-admin.edit');
    Route::put('/dashboard/kontrol-akun-admin/edit-akun/{admin_id}', [AdminController::class, 'resetAdmin'])->name('admin.control-admin.reset');

      // Route untuk Control Akun Custome
    Route::get('/dashboard/kontrol-akun-customer', [AdminController::class, 'indexCustomer'])->name('admin.control-customer.index');
    Route::get('/dashboard/kontrol-akun-customer/buat-akun', [AdminController::class, 'createCustomer'])->name('admin.control-customer.create');
    Route::post('/dashboard/kontrol-akun-customer/buat-akun', [AdminController::class, 'storeCustomer'])->name('admin.control-customer.store');
    Route::delete('/dashboard/kontrol-akun-customer/hapus-akun/{customer_id}', [AdminController::class, 'deleteCustomer'])->name('admin.control-customer.delete');
    Route::get('/dashboard/kontrol-akun-customer/edit-akun/{customer_id}', [AdminController::class, 'editCustomer'])->name('admin.control-customer.edit');
    Route::put('dashboard/kontrol-akun-customer/edit-akun/{customer_id}', [AdminController::class, 'resetCustomer'])->name('admin.control-customer.reset');

    // Rute untuk KategoriSparepart
    Route::get('/kategorisparepart', [CategoryController::class, 'indexCategory'])->name('admin.category.index');
    Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('admin.category.create');
    Route::post('/create-category', [CategoryController::class, 'storeCategory'])->name('admin.category.store');
    Route::delete('/kategorisparepart/{kategorisparepart}', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    Route::get('/kategorisparepart/{kategorisparepart}/edit', [CategoryController::class, 'editCategory'])->name('admin.category.edit');
    Route::put('/kategorisparepart/{kategorisparepart}', [CategoryController::class, 'updateCategory'])->name('admin.category.update');


    // Route untuk Control Sparepart
    Route::get('/dashboard/sparepart/kontrol-sparepart', [AdminDashboardController::class, 'KontrolSparepart'])->name('admin.kontrol-sparepart');
    Route::delete('/dashboard/sparepart/kontrol-sparepart/{sparepart_id}', [AdminDashboardController::class, 'HapusSparepart'])->name('admin.hapus-sparepart');
    Route::get('/dashboard/sparepart/kontrol-sparepart/edit_sparepart/{sparepart_id}', [AdminDashboardController::class, 'EditSparepart'])->name('admin.edit-sparepart');
    Route::post('/dashboard/sparepart/kontrol-sparepart/edit_info_sparepart/{customer_id}', [AdminDashboardController::class, 'EditInfoSparepart'])->name('admin.edit-info-sparepart');
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
