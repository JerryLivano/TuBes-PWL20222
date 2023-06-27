<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
            ->select('*')
            ->where('users.id', Auth::user()->id)
            ->get();
            return view('UserMahasiswa.index',[
                'UserMahasiswa' => $data
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('UserMahasiswa/edit', [
            'UserMahasiswa' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = validator($request->all(), [
            'txtId' => 'string|max:50',
            'txtName' => 'string|max:100',
            'txtEmail' => 'string|max:50',
            'txtAlamat' => 'string|max:100',
            'txtGender' => 'string|max:20',
            'txtLahir' => 'date|max:100'
        ])->validate();

        $user -> id = $validatedData['txtId'];
        $user -> name = $validatedData['txtName'];
        $user -> email = $validatedData['txtEmail'];
        $user -> alamat = $validatedData['txtAlamat'];
        $user -> gender = $validatedData['txtGender'];
        $user -> tanggal_lahir = $validatedData['txtLahir'];
        $file = $request->file('profile');
        $extension = $file->getClientOriginalExtension();
        $filename = $user -> id . '.' . $extension;
        if ($user -> profile != NULL){
            unlink('img/' . $user -> profile);
        }
        $file->move('img/', $filename);
        $user -> profile = $filename;
        $user -> save();
        return redirect(route('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
