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

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);


Route::middleware('auth')->group(function() {
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswaList');
Route::get('/programstudi',[ProgramStudiController::class,'index'])->name('programStudiList');
Route::get('/programstudi/edit/{programStudi}',[ProgramStudiController::class,'edit'])->name('EditProgramStudiList');
Route::post('/programstudi/edit/{programStudi}',[ProgramStudiController::class,'update'])->name('UpdateProgramStudiList');
Route::get('/programstudi/create', [ProgramStudiController::class, 'create'])->name('createProgramStudi');
Route::post('/programstudi/create', [ProgramStudiController::class, 'store'])->name('storeProgramStudi');
Route::get('/mahasiswaprogramstudi',[MahasiswaMemilikiMatkulController::class,'index'])->name('mahasiswaProgramStudiList');
Route::get('/mata_kuliah', [MataKuliahController::class,'index']) -> name('mataKuliahList');
Route::get('/programstudi/delete/{programStudi}',[ProgramStudiController::class,'destroy']) -> name('deleteProgramStudi');
Route::get('/mahasiswa/delete/{mahasiswa}',[MahasiswaController::class,'destroy']) -> name('deleteMahasiswa');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('createMahasiswa');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('storeMahasiswa');
Route::get('/mahasiswa/edit/{mahasiswa}',[MahasiswaController::class,'edit'])->name('editMahasiswa');
Route::post('/mahasiswa/edit/{mahasiswa}',[MahasiswaController::class,'update'])->name('updateMahasiswa');

Route::get('/mata_kuliah/create', [MataKuliahController::class, 'create'])->name('createMataKuliah');
Route::post('/mata_kuliah/create', [MataKuliahController::class, 'store'])->name('storeMataKuliah');
Route::get('/mata_kuliah/edit/{mataKuliah}',[MataKuliahController::class,'edit'])->name('editMataKuliah');
Route::post('/mata_kuliah/edit/{mataKuliah}',[MataKuliahController::class,'update'])->name('updateMataKuliah');
Route::get('/mata_kuliah/delete/{mataKuliah}',[MataKuliahController::class,'destroy']) -> name('deleteMataKuliah');
});