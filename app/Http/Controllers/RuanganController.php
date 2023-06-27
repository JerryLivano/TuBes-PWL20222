<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ruangan')
        ->select('ruangan.kode_ruang','ruangan.nama_ruang')
        ->join('fakultas', 'ruangan.kode_fakultas','=','fakultas.kode_fakultas')
        ->join('program_studi','fakultas.kode_fakultas','=','program_studi.kode_fakultas')
        ->join('users','users.kode_prodi','=','program_studi.kode_prodi')
        ->where('users.id',Auth::user()->id)
        ->get();
        return view('ruangan.index',[
            'ruangans' => $data
        ]);
        // $data = Ruangan::all();
        // return view('ruangan.index',[
        //     'ruangans' => $data
        // ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan/create');
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
            'txtId' => 'required|string|max:100',
            'txtName' => 'required|string|max:100'
        ])->validate();

        $fk = DB::table('program_studi')
        ->select('program_studi.kode_fakultas')
        ->where('program_studi.kode_prodi', Auth::user()->kode_prodi)
        ->get();

        $ruangan = new Ruangan();
        $ruangan->kode_ruang = $validatedData['txtId'];
        $ruangan->nama_ruang = $validatedData['txtName'];
        $ruangan->kode_fakultas = $fk["kode_fakultas"];
        $ruangan->save();
        return redirect(route('ruanganList'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan/edit', [
            'ruangan' => $ruangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validatedData = validator($request->all(), [
            'txtName' => 'required|string|max:100'
        ])->validate();

        $ruangan->nama_ruang = $validatedData['txtName'];
        $ruangan->save(); 
        return redirect(route('ruanganList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect(route('ruanganList'));
    }
}
