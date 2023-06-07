<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\MataKuliah;
use App\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MataKuliah::all();
        return view('mata_kuliah.index',[
            'mata_kuliahs' => $data
        ]);
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
            'txtKodeProdi' => 'required|int'
        ]) -> validate();
        $matkul = new MataKuliah();
        $matkul -> kode_matkul = $validatedData['txtKodeMatkul'];
        $matkul -> nama_matkul = $validatedData['txtName'];
        $matkul -> semester = $validatedData['txtSemester'];
        $matkul -> kode_prodi = $validatedData['txtKodeProdi'];
        $matkul -> save();
        return redirect(route('mataKuliahList'));
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
            'txtKodeProdi' => 'required|int'
        ])->validate();
        $mataKuliah -> kode_matkul = $validatedData['txtKodeMatkul'];
        $mataKuliah -> nama_matkul = $validatedData['txtName'];
        $mataKuliah -> semester = $validatedData['txtSemester'];
        $mataKuliah -> kode_prodi = $validatedData['txtKodeProdi'];
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
