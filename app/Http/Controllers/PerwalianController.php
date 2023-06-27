<?php

namespace App\Http\Controllers;

use App\DKBS;
use App\Perwalian;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerwalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perwalian::all();
        return view('perwalian.index', [
            'perwalian' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perwalian/create');
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
            'txtSemester' => 'required|string|max:100'
        ])->validate();
        $perwalian = new Perwalian();
        $perwalian->semester = $validatedData['txtSemester'];
        $perwalian->status = 0;
        $perwalian->save();
        return redirect(route('perwalianList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function show(Perwalian $perwalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Perwalian $perwalian)
    {
        return view('perwalian/edit', [
            'perwalian' => $perwalian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perwalian $perwalian)
    {
        $validatedData = validator($request->all(), [
            'txtName' => 'required|string|max:100'
        ])->validate();

        $perwalian->semester = $validatedData['txtName'];
        $perwalian->save();
        return redirect(route('perwalianList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perwalian  $perwalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perwalian $perwalian)
    {
        $perwalian->delete();
        return redirect(route('perwalianList'));
    }

    public function deactive()
    {
        $data = Perwalian::all();
        foreach ($data as $datas) {
            $datas->status = 0;
            $datas->save();
        }
        return redirect(route('perwalianList'));
    }

    public function activate(Perwalian $perwalian)
    {
        self::deactive();
        $perwalian->status = 1;
        $perwalian->save();
        return redirect(route('perwalianList'));
    }

    public function dkbsIndex(Perwalian $perwalian)
    {
        $data = DB::table('perwalian')
            ->select('perwalian.id', 'dkbs.nrp', 'users.name')
            ->join('dkbs', 'dkbs.perwalian_id', '=', 'perwalian.id')
            ->join('users', 'users.id', '=', 'dkbs.nrp')
            ->where('users.kode_prodi', Auth::user()->kode_prodi)
            ->where('dkbs.perwalian_id', $perwalian->id)
            ->distinct()
            ->get();
        return view('perwalian/dkbsList', [
            'perwalian' => $data
        ]);
    }

    public function dkbsListAdmin(Perwalian $perwalian, $nrp)
    {
        $data = DB::table('dkbs')
            ->select('*')
            ->where('dkbs.perwalian_id', $perwalian->id)
            ->where('dkbs.nrp', $nrp)
            ->get();
        return view('perwalian/dkbsPerMahasiswa', [
            'perwalian' => $data
        ]);
    }

    public function createDKBSAdmin($perwalian, $nrp)
    {
        $data = DB::table('mata_kuliah')
            ->select('kode_matkul', 'nama_matkul')
            ->where('kode_prodi', Auth::user()->kode_prodi)
            ->get();
        return view('perwalian/createDKBSAdmin', ["perwalians" => $data])
            ->with('perwalian', $perwalian)
            ->with('nrp', $nrp);
    }

    public function storeDKBSAdmin(Request $request, $perwalian, $nrp)
    {
        $validatedData = validator($request->all(), [
            'txtKodeMatkul' => 'required|string|max:100',
            'txtKelas' => 'required|string|max:100',
            'txtHari' => 'required|string|max:100',
            'txtJaw' => 'required|date_format:H:i:s',
            'txtJak' => 'required|date_format:H:i:s',
            "txtRuangan" => 'required|string|max:100'
        ])->validate();
        $dkbs = new DKBS();
        $dkbs->kode_matkul = $validatedData['txtKodeMatkul'];
        $dkbs->nrp = $nrp;
        $dkbs->perwalian_id = $perwalian;
        $dkbs->kelas = $validatedData['txtKelas'];
        $dkbs->hari = $validatedData['txtHari'];
        $dkbs->jam_awal = $validatedData['txtJaw'];
        $dkbs->jam_akhir = $validatedData['txtJak'];
        $dkbs->ruangan = $validatedData['txtRuangan'];
        $dkbs->save();
        return redirect(route('dkbsAdminMahasiswaList', ['perwalian' => $perwalian, 'nrp' => $nrp]));
    }

    public function deleteDKBSAdmin($perwalian, $nrp, $kode_matkul)
    {
        $dkbs = DB::table('DKBS')
            ->where('perwalian_id', $perwalian)
            ->where('nrp', $nrp)
            ->where('kode_matkul', $kode_matkul)
            ->delete();
        return redirect(route('dkbsAdminMahasiswaList', ['perwalian' => $perwalian, 'nrp' => $nrp]));
    }
}
