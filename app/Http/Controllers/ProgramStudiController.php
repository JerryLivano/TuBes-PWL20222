<?php

namespace App\Http\Controllers;

use App\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProgramStudi::all();
        return view('programstudi.index',[
            'programstudis'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programstudi/create');
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
            'txtName' => 'required|string|max:100'
        ]) -> validate();
        $prodi = new ProgramStudi();
        $prodi -> nama_prodi = $validatedData['txtName'];
        $prodi -> save();
        return redirect(route('programStudiList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(ProgramStudi $programStudi)
    {
        return view('programstudi/edit', [
            'programStudi' => $programStudi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $validatedData = validator($request->all(), [
            'txtName' => 'required|string|max:100'
        ])->validate();

        $programStudi->nama_prodi = $validatedData['txtName'];
        $programStudi->save();
        return redirect(route('programStudiList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $programStudi)
    {
        //
    }
}
