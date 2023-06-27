<?php

namespace App\Http\Controllers;

use App\DKBS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DKBSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dkbs')
            ->select('mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul', 'dkbs.kelas', 'dkbs.hari', 'dkbs.jam_awal', 'dkbs.jam_akhir', 'dkbs.ruangan')
            ->join('mata_kuliah', 'mata_kuliah.kode_matkul', '=', 'dkbs.kode_matkul')
            ->where('dkbs.nrp', Auth::user()->id)
            ->orderBy('mata_kuliah.nama_matkul', 'ASC')
            ->get();

        return view('DKBS.index', [
            'dkbss' => $data
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
        $data = DB::table('Perwalian')
        ->select('id')
        ->where('status',1)
        ->get();


        $matkul = new DKBS();
        $matkul -> kode_matkul = $request->input('txtKode');
        $matkul -> kelas = $request->input('txtKelas');
        $matkul -> hari = $request->input('txtHari');
        $matkul -> jam_akhir = $request->input('txtAkhir');
        $matkul -> jam_awal = $request->input('txtAwal');
        $matkul -> ruangan = $request->input('txtRuang');
        $matkul -> perwalian_id = ($data[0]->id);
        $matkul -> nrp = Auth::user()->id;
        $matkul -> save();
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DKBS  $dKBS
     * @return \Illuminate\Http\Response
     */
    public function show(DKBS $dKBS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DKBS  $dKBS
     * @return \Illuminate\Http\Response
     */
    public function edit(DKBS $dKBS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DKBS  $dKBS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DKBS $dKBS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DKBS  $dKBS
     * @return \Illuminate\Http\Response
     */
    public function destroy(DKBS $dKBS)
    {
        //
    }
}
