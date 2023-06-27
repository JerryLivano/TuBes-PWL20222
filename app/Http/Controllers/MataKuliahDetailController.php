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
    public function index($kode_matkul)
    {   
        if(Auth::user()->role =='Admin'){
            $data = DB::table('matkul_detail')
            ->select('matkul_detail.tipe','matkul_detail.kelas','matkul_detail.kuota','matkul_detail.hari','matkul_detail.jam_awal','matkul_detail.jam_akhir','perwalian.semester','matkul_detail.kode_ruang')
            ->join('mata_kuliah','matkul_detail.kode_matkul','=','mata_kuliah.kode_matkul')
            ->join('perwalian','matkul_detail.perwalian_id','=','perwalian.id')
            ->join('program_studi','program_studi.kode_prodi','=','mata_kuliah.kode_prodi')
            ->join('users', 'users.kode_prodi', '=', 'program_studi.kode_prodi')
            ->where('matkul_detail.kode_matkul', $kode_matkul)
            ->where('users.id',Auth::user()->id)
            ->get();
            return view('mataKuliahDetail.index',[
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
        $matkul = DB::table('mata_kuliah')
        ->select('mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul')
        ->where('mata_kuliah.kode_prodi', Auth::user()->kode_prodi)
        ->get();
        $ruang = DB::table('ruangan')
        ->select('ruangan.kode_ruang', 'ruangan.nama_ruang')
        ->join('fakultas', 'fakultas.kode_fakultas', '=', 'ruangan.kode_fakultas')
        ->join('program_studi', 'program_studi.kode_fakultas', '=', 'fakultas.kode_fakultas')
        ->where('program_studi.kode_prodi',Auth::user()->kode_prodi)
        ->get();
        $perwalian = DB::table('perwalian')
        ->select('perwalian.id','perwalian.semester')
        ->join('dkbs','dkbs.perwalian_id','=','perwalian.id')
        ->where('dkbs.nrp',Auth::user()->id)
        ->get();
        return view('matakuliahdetail/create', compact(['matkul', 'ruang', 'perwalian']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(),[
            'txtId' => 'required|string|max:50',
            'txtKelas' => 'required|string|max:2',
            'txtKuota' => 'required|integer',
            'txtHari' => 'required|string|max:50',
            'txtJamAwal' => 'required|time',
            'txtJamAkhir' => 'required|time',
            'txtKodeMatkul' => 'required|sting|max:50',
            'txtPerwalianId' => 'required|string|max:50',
            'txtKodeRuang' => 'required|string|max:50'
        ])->validate();

        $matkul_detail = new MataKuliahDetail();
        $matkul_detail-> tipe = $validateData['txtId'];
        $matkul_detail-> kelas = $validateData['txtKelas'];
        $matkul_detail-> kuota = $validateData['txtKuota'];
        $matkul_detail-> hari = $validateData['txtHari'];
        $matkul_detail-> jam_awal = $validateData['txtJamAwal'];
        $matkul_detail-> jam_akhir = $validateData['txtJamAkhir'];
        $matkul_detail-> kode_matkul = $validateData['txtKodeMatkul'];
        $matkul_detail-> perwalian_id = $validateData['txtPerwalianId'];
        $matkul_detail-> kode_ruang = $validateData['txtKodeRuang'];
        $matkul_detail->save();
        return redirect(route('mataKuliahList'));
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
