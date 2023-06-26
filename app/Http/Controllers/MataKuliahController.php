<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\MataKuliah;
use App\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = DB::table('mata_kuliah')
            ->select('mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul', 'mata_kuliah.semester', 'mata_kuliah.beban_sks', 'mata_kuliah.deskripsi')
            ->join('program_studi', 'mata_kuliah.kode_prodi', '=', 'program_studi.kode_prodi')
            ->join('users', 'users.kode_prodi', '=', 'program_studi.kode_prodi')
            ->where('users.id', Auth::user()->id)
            ->orderBy('mata_kuliah.semester', 'ASC')
            ->get();

        if(Auth::user()->role =='Admin'){
            return view('mata_kuliah.index',[
                'mata_kuliahs' => $data
            ]);

        } elseif (Auth::user()->role =='Mahasiswa'){
            return view('MataKuliahMahasiswa.index',[
                'MataKuliahMahasiswa' => $data
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
        $prodi = ProgramStudi::all();
        return view('mata_kuliah/create',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'txtKodeMatkul' => 'required|string|max:50',
            'txtName' => 'required|string|max:100',
            'txtSemester' => 'required|string|max:50',
            'txtBebanSks' => 'required|integer|max:10',
            'txtDeskripsi' => 'nullable|string|max:100',
        ]) -> validate();
        $matkul = new MataKuliah();
        $matkul -> kode_matkul = $validatedData['txtKodeMatkul'];
        $matkul -> nama_matkul = $validatedData['txtName'];
        $matkul -> semester = $validatedData['txtSemester'];
        $matkul -> beban_sks = $validatedData['txtBebanSks'];
        $matkul -> deskripsi = $validatedData['txtDeskripsi'];
        $matkul -> kode_prodi = Auth::user()->kode_prodi;
        $matkul -> save();
        return redirect(route('mataKuliahList'), compact('prodi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $mataKuliah)
    {
        $prodi = ProgramStudi::all();
        return view('mata_kuliah/edit', [
            'mataKuliah' => $mataKuliah
        ],compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $validatedData = validator($request->all(), [
            'txtKodeMatkul' => 'required|string|max:50',
            'txtName' => 'required|string|max:100',
            'txtSemester' => 'required|string|max:50',
            'txtBebanSks' => 'required|integer|max:10',
            'txtDeskripsi' => 'nullable|string|max:100'
        ])->validate();
        $mataKuliah -> kode_matkul = $validatedData['txtKodeMatkul'];
        $mataKuliah -> nama_matkul = $validatedData['txtName'];
        $mataKuliah -> semester = $validatedData['txtSemester'];
        $mataKuliah -> beban_sks = $validatedData['txtBebanSks'];
        $mataKuliah -> deskripsi = $validatedData['txtDeskripsi'];
        $mataKuliah -> save();
        return redirect(route('mataKuliahList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect(route('mataKuliahList'));
    }
}
