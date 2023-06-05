<?php

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

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMemilikiMatkulController;
use App\Http\Controllers\ProgramStudiController;
use App\Mahasiswa;
use App\ProgramStudi;

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswaList');
Route::get('/programstudi',[ProgramStudiController::class,'index'])->name('programStudiList');
Route::get('/mahasiswaprogramstudi',[MahasiswaMemilikiMatkulController::class,'index'])->name('mahasiswaProgramStudiList');