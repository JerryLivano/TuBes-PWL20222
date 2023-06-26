<?php

namespace App\Http\Controllers;

use App\Perwalian;
use Illuminate\Http\Request;
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

    public function getAllSks()
    {
        $purchases = DB::table('transactions')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('categories.kind', '=', 1)
            ->sum('transactions.amount');
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
}
