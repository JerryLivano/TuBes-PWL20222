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
use App\Http\Controllers\UserManagementController;
use App\Mahasiswa;
use App\ProgramStudi;

Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('/starter', function () {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswaList');
    Route::get('/programstudi', [ProgramStudiController::class, 'index'])->name('programStudiList');
    Route::get('/programstudi/edit/{programStudi}', [ProgramStudiController::class, 'edit'])->name('EditProgramStudiList');
    Route::post('/programstudi/edit/{programStudi}', [ProgramStudiController::class, 'update'])->name('UpdateProgramStudiList');
    Route::get('/programstudi/create', [ProgramStudiController::class, 'create'])->name('createProgramStudi');
    Route::post('/programstudi/create', [ProgramStudiController::class, 'store'])->name('storeProgramStudi');
    Route::get('/mahasiswaprogramstudi', [MahasiswaMemilikiMatkulController::class, 'index'])->name('mahasiswaProgramStudiList');
    Route::get('/mata_kuliah', [MataKuliahController::class, 'index'])->name('mataKuliahList');
    Route::get('/programstudi/delete/{programStudi}', [ProgramStudiController::class, 'destroy'])->name('deleteProgramStudi');
    Route::get('/mahasiswa/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('deleteMahasiswa');
    Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('userList');
    Route::get('/usermanagement/create', [UserManagementController::class, 'create'])->name('createUserList');
    Route::post('/usermanagement/create', [UserManagementController::class, 'store'])->name('storeUserList');
    Route::get('/usermanagement/delete/{users}', [UserManagementController::class, 'destroy'])->name('deleteUser');
    Route::get('/usermanagement/edit/{users}', [UserManagementController::class, 'edit'])->name('EditUserList');
    Route::post('/usermanagement/edit/{users}', [UserManagementController::class, 'update'])->name('UpdateUserList');
});
