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

use App\Http\Controllers\DKBSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaMemilikiMatkulController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserManagementController;
use App\Mahasiswa;
use App\ProgramStudi;
use App\Ruangan;
use App\Http\Controllers\MataKuliahDetailController;
use App\Http\Controllers\PerwalianController; 
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('/starter', function () {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/programstudi', [ProgramStudiController::class, 'index'])->name('programStudiList');
    Route::get('/programstudi/edit/{programStudi}', [ProgramStudiController::class, 'edit'])->name('EditProgramStudiList');
    Route::post('/programstudi/edit/{programStudi}', [ProgramStudiController::class, 'update'])->name('UpdateProgramStudiList');
    Route::get('/programstudi/create', [ProgramStudiController::class, 'create'])->name('createProgramStudi');
    Route::post('/programstudi/create', [ProgramStudiController::class, 'store'])->name('storeProgramStudi');
    Route::get('/programstudi/delete/{programStudi}', [ProgramStudiController::class, 'destroy'])->name('deleteProgramStudi');

    Route::get('/mahasiswaprogramstudi', [MahasiswaMemilikiMatkulController::class, 'index'])->name('mahasiswaProgramStudiList');

    Route::get('/usermanagement', [UserManagementController::class, 'index'])->name('userList');
    Route::get('/usermanagement/create', [UserManagementController::class, 'create'])->name('createUserList');
    Route::post('/usermanagement/create', [UserManagementController::class, 'store'])->name('storeUserList');
    Route::get('/usermanagement/delete/{users}', [UserManagementController::class, 'destroy'])->name('deleteUser');
    Route::get('/usermanagement/edit/{users}', [UserManagementController::class, 'edit'])->name('EditUserList');
    Route::post('/usermanagement/edit/{users}', [UserManagementController::class, 'update'])->name('UpdateUserList');

    Route::get('/matakuliahdetail', [MataKuliahDetailController::class, 'index'])->name('mataKuliahDetailList');
    Route::get('/matakuliahdetail/create', [MataKuliahDetailController::class, 'create'])->name('createMataKuliahDetail');
    Route::post('/matakuliahdetail/create', [MataKuliahDetailController::class, 'store'])->name('storeMataKuliahDetail');
    Route::get('/matakuliahdetail/delete/{mataKuliahDetail}', [MataKuliahDetailController::class, 'destroy'])->name('deleteMataKuliahDetailList');
    Route::post('/matakuliahdetail/edit/{mataKuliahDetail}', [MataKuliahDetailController::class, 'update'])->name('UpdateMataKuliahDetailList');
    Route::get('/matakuliahdetail/edit/{mataKuliahDetail}', [MataKuliahDetailController::class, 'edit'])->name('EditMataKuliahDetailList');

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswaList');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('createMahasiswa');
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('storeMahasiswa');
    Route::get('/mahasiswa/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('editMahasiswa');
    Route::post('/mahasiswa/edit/{mahasiswa}', [MahasiswaController::class, 'update'])->name('updateMahasiswa');
    Route::get('/mahasiswa/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('deleteMahasiswa');

    Route::get('/mata_kuliah/create', [MataKuliahController::class, 'create'])->name('createMataKuliah');
    Route::post('/mata_kuliah/create', [MataKuliahController::class, 'store'])->name('storeMataKuliah');
    Route::get('/mata_kuliah/edit/{mataKuliah}', [MataKuliahController::class, 'edit'])->name('editMataKuliah');
    Route::post('/mata_kuliah/edit/{mataKuliah}', [MataKuliahController::class, 'update'])->name('updateMataKuliah');
    Route::get('/mata_kuliah/delete/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('deleteMataKuliah');
    Route::get('/mata_kuliah', [MataKuliahController::class, 'index'])->name('mataKuliahList');

    Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruanganList');
    Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('createRuangan');
    Route::post('/ruangan/create', [RuanganController::class, 'store'])->name('storeRuangan');
    Route::get('/ruangan/delete/{ruangan}', [RuanganController::class, 'destroy'])->name('deleteRuanganList');
    Route::post('/ruangan/edit/{ruangan}', [RuanganController::class, 'update'])->name('updateRuanganList');
    Route::get('/ruangan/edit/{ruangan}', [RuanganController::class, 'edit'])->name('editRuanganList');

    Route::get('/perwalian', [PerwalianController::class, 'index'])->name('perwalianList');
    Route::get('/perwalian/create', [PerwalianController::class, 'create'])->name('createPerwalian');
    Route::post('/perwalian/create', [PerwalianController::class, 'store'])->name('storePerwalian');
    Route::get('/perwalian/delete/{perwalian}', [PerwalianController::class, 'destroy'])->name('deletePerwalian');
    Route::post('/perwalian/edit/{perwalian}', [PerwalianController::class, 'update'])->name('updatePerwalian');
    Route::get('/perwalian/edit/{perwalian}', [PerwalianController::class, 'edit'])->name('editPerwalian');

    
    Route::get('/MataKuliahMahasiswa',[MataKuliahController::class,'index'])->name('mataKuliahMahasiswaList');

    Route::get('/MataKuliahMahasiswaDetail',[MataKuliahDetailController::class,'index'])->name('mataKuliahMahasiswaDetailList');

    Route::get('/UserMahasiswa',[UserController::class,'index'])->name('profile');
    Route::post('/UserMahasiswa/edit/{user}', [UserController::class, 'update'])->name('updateProfile');
    Route::get('/UserMahasiswa/edit/{user}', [UserController::class, 'edit'])->name('editProfile');

    Route::get('/dkbs',[DKBSController::class,'index'])->name('dkbsList');
});
