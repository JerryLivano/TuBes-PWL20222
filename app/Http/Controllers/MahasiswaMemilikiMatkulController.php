<?php

namespace App\Http\Controllers;

use App\MahasiswaMemilikiMatkul;
use Illuminate\Http\Request;

class MahasiswaMemilikiMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MahasiswaMemilikiMatkul::all();
        return view('mahasiswamemilikimatkul.index',[
            'mahasiswamemilikimatkuls'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\MahasiswaMemilikiMatkul  $mahasiswaMemilikiMatkul
     * @return \Illuminate\Http\Response
     */
    public function show(MahasiswaMemilikiMatkul $mahasiswaMemilikiMatkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MahasiswaMemilikiMatkul  $mahasiswaMemilikiMatkul
     * @return \Illuminate\Http\Response
     */
    public function edit(MahasiswaMemilikiMatkul $mahasiswaMemilikiMatkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MahasiswaMemilikiMatkul  $mahasiswaMemilikiMatkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MahasiswaMemilikiMatkul $mahasiswaMemilikiMatkul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MahasiswaMemilikiMatkul  $mahasiswaMemilikiMatkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(MahasiswaMemilikiMatkul $mahasiswaMemilikiMatkul)
    {
        //
    }
}
