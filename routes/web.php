<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LokasiKostController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TenatsController;
use App\Models\Kamar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return view('home');
});

// Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
// Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
// Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
// Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
// Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
Route::resource('kamar', KamarController::class);
Route::resource('lokasi_kos', LokasiKostController::class);