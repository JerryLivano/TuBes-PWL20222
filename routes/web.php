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
use App\Http\Controllers\MataKuliahController;
use App\Mahasiswa;
use App\ProgramStudi;
use App\Http\Controllers\MataKuliahDetailController;

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);


Route::middleware('auth')->group(function() {
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/mahasiswaprogramstudi',[MahasiswaMemilikiMatkulController::class,'index'])->name('mahasiswaProgramStudiList');
Route::get('/mata_kuliah', [MataKuliahController::class,'index']) -> name('mataKuliahList');
Route::get('/mahasiswa/delete/{mahasiswa}',[MahasiswaController::class,'destroy']) -> name('deleteMahasiswa');

});
Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswaList');

Route::get('/matakuliahdetail',[MataKuliahDetailController::class,'index']) -> name('mataKuliahDetailList');
Route::get('/matakuliahdetail/create', [MataKuliahDetailController::class, 'create'])->name('createMataKuliahDetail');
Route::post('/matakuliahdetail/create', [MataKuliahDetailController::class, 'store'])->name('storeMataKuliahDetail');
Route::get('/matakuliahdetail/delete/{mataKuliahDetail}',[MataKuliahDetailController::class,'destroy']) -> name('deleteMataKuliahDetail');
Route::post('/matakuliahdetail/edit/{mataKuliahDetail}',[MataKuliahDetailController::class,'update'])->name('UpdateMataKuliahDetail');
Route::get('/matakuliahdetail/edit/{mataKuliahDetail}',[MataKuliahDetailController::class,'edit'])->name('EditMataKuliahDetail');

Route::get('/programstudi',[ProgramStudiController::class,'index'])->name('programStudiList');
Route::get('/programstudi/create', [ProgramStudiController::class, 'create'])->name('createProgramStudi');
Route::post('/programstudi/create', [ProgramStudiController::class, 'store'])->name('storeProgramStudi');
Route::get('/programstudi/delete/{programStudi}',[ProgramStudiController::class,'destroy']) -> name('deleteProgramStudi');
Route::post('/programstudi/edit/{programStudi}',[ProgramStudiController::class,'update'])->name('UpdateProgramStudiList');
Route::get('/programstudi/edit/{programStudi}',[ProgramStudiController::class,'edit'])->name('EditProgramStudiList');
