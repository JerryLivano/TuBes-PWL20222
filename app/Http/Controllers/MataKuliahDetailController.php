<?php

namespace App\Http\Controllers;

use App\MataKuliah;
use App\MataKuliahDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $data = MataKuliahDetail::all();
            return view('PerwalianMahasiswa.index',[
                'MataKuliahMahasiswas'=>$data
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
