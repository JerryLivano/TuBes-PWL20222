<?php

namespace App\Http\Controllers;

use App\MataKuliah;
use App\MataKuliahDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MataKuliahDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->role =='Admin'){
            $data = MataKuliahDetail::all();
            return view('matakuliahdetail.index',[
                'matakuliahdetails' => $data
            ]);
        }elseif(Auth::user()->role =='Mahasiswa'){
            $matkulSenin = DB::table('matkul_detail')
            ->select('matkul_detail.tipe', 'matkul_detail.kelas', 'matkul_detail.kuota', 'mata_kuliah.beban_sks', 'matkul_detail.hari', 'matkul_detail.jam_awal','matkul_detail.kode_ruang','matkul_detail.jam_akhir','mata_kuliah.nama_matkul','mata_kuliah.kode_matkul','mata_kuliah.semester',)
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'matkul_detail.kode_matkul')
            ->where('matkul_detail.hari','Senin')
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();
            $matkulSelasa = DB::table('matkul_detail')
            ->select('matkul_detail.tipe', 'matkul_detail.kelas', 'matkul_detail.kuota', 'mata_kuliah.beban_sks', 'matkul_detail.hari', 'matkul_detail.jam_awal','matkul_detail.kode_ruang','matkul_detail.jam_akhir','mata_kuliah.nama_matkul','mata_kuliah.kode_matkul','mata_kuliah.semester',)
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'matkul_detail.kode_matkul')
            ->where('matkul_detail.hari','Selasa')
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();
            $matkulRabu = DB::table('matkul_detail')
            ->select('matkul_detail.tipe', 'matkul_detail.kelas', 'matkul_detail.kuota', 'mata_kuliah.beban_sks', 'matkul_detail.hari', 'matkul_detail.jam_awal','matkul_detail.kode_ruang','matkul_detail.jam_akhir','mata_kuliah.nama_matkul','mata_kuliah.kode_matkul','mata_kuliah.semester',)
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'matkul_detail.kode_matkul')
            ->where('matkul_detail.hari','Rabu')
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();
            $matkulKamis = DB::table('matkul_detail')
            ->select('matkul_detail.tipe', 'matkul_detail.kelas', 'matkul_detail.kuota', 'mata_kuliah.beban_sks', 'matkul_detail.hari', 'matkul_detail.jam_awal','matkul_detail.kode_ruang','matkul_detail.jam_akhir','mata_kuliah.nama_matkul','mata_kuliah.kode_matkul','mata_kuliah.semester',)
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'matkul_detail.kode_matkul')
            ->where('matkul_detail.hari','Kamis')
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();
            $matkulJumat = DB::table('matkul_detail')
            ->select('matkul_detail.tipe', 'matkul_detail.kelas', 'matkul_detail.kuota', 'mata_kuliah.beban_sks', 'matkul_detail.hari', 'matkul_detail.jam_awal','matkul_detail.kode_ruang','matkul_detail.jam_akhir','mata_kuliah.nama_matkul','mata_kuliah.kode_matkul','mata_kuliah.semester',)
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'matkul_detail.kode_matkul')
            ->where('matkul_detail.hari','Jumat')
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();

            return view('PerwalianMahasiswa.index',[
                'matakuliahdetails' => [$matkulSenin,$matkulSelasa,$matkulRabu,$matkulKamis,$matkulJumat]
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliahdetail/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataKuliahDetail  $mataKuliahDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliahDetail $mataKuliahDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataKuliahDetail  $mataKuliahDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $mataKuliahDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataKuliahDetail  $mataKuliahDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataKuliahDetail $mataKuliahDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataKuliahDetail $mataKuliahDetail)
    {
        $mataKuliahDetail -> delete();
        return redirect(route('mataKuliahDetailList'));
    }
}
