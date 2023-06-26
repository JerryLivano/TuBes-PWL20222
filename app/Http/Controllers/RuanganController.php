<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ruangan::all();
        return view('ruangan.index',[
            'ruangans' => $data
        ]); 
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
        $ruangan = new Ruangan();
        $ruangan->kode_ruang = $validatedData['txtId'];
        $ruangan->nama_ruang = $validatedData['txtName'];
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
