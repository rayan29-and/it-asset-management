<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| Halaman Setelah Login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index']);


    /*
    |--------------------------------------------------------------------------
    | Kategori Aset
    |--------------------------------------------------------------------------
    */

    Route::get('/kategori-aset', [KategoriAsetController::class, 'index']);

    Route::get('/kategori-aset/create', [KategoriAsetController::class, 'create']);

    Route::post('/kategori-aset', [KategoriAsetController::class, 'store']);

    Route::get('/kategori-aset/{id}/edit', [KategoriAsetController::class, 'edit']);

    Route::put('/kategori-aset/{id}', [KategoriAsetController::class, 'update']);

    Route::delete('/kategori-aset/{id}', [KategoriAsetController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Data Aset
    |--------------------------------------------------------------------------
    */

    Route::get('/aset', [AsetController::class, 'index']);

    Route::get('/aset/create', [AsetController::class, 'create']);

    Route::post('/aset', [AsetController::class, 'store']);

    Route::get('/aset/{id}', [AsetController::class, 'show']);

    Route::get('/aset/{id}/edit', [AsetController::class, 'edit']);

    Route::put('/aset/{id}', [AsetController::class, 'update']);

    Route::delete('/aset/{id}', [AsetController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Maintenance
    |--------------------------------------------------------------------------
    */

    Route::get('/maintenance', [MaintenanceController::class, 'index']);

    Route::get('/maintenance/create', [MaintenanceController::class, 'create']);

    Route::post('/maintenance', [MaintenanceController::class, 'store']);

    Route::get('/maintenance/{id}', [MaintenanceController::class, 'show']);

    Route::get('/maintenance/{id}/edit', [MaintenanceController::class, 'edit']);

    Route::put('/maintenance/{id}', [MaintenanceController::class, 'update']);

    Route::delete('/maintenance/{id}', [MaintenanceController::class, 'destroy']);


    /*
    |--------------------------------------------------------------------------
    | Laporan
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');

    Route::get('/aset/{id}/laporan', [LaporanController::class, 'asetPdf'])
        ->name('aset.laporan');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/settings', [ProfileController::class, 'settings'])
        ->name('profile.settings');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');

    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])
        ->name('profile.photo.delete');

    Route::delete('/profile/account', [ProfileController::class, 'deleteAccount'])
        ->name('profile.account.delete');


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout']);

});