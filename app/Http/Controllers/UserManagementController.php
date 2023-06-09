<?php

namespace App\Http\Controllers;

use App\ProgramStudi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'users.password', 'users.alamat', 'users.gender', 'users.tanggal_lahir', 'users.profile')
            ->join('program_studi', 'users.kode_prodi', '=', 'program_studi.kode_prodi')
            ->where('users.role', 'Mahasiswa')
            ->where('program_studi.kode_prodi', Auth::user()->kode_prodi)
            ->orderBy('users.id', 'ASC')
            ->get();

        return view('users.index', [
            'users' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
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
            'id' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:50'],
            'tanggal_lahir' => ['nullable', 'date']
        ])->validate();

        $users = new User();
        $users->id = $validatedData['id'];
        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
        $users->password = Hash::make($validatedData['password']);
        $users->role = 'Mahasiswa';
        $users->alamat = $validatedData['address'];
        if ($request['gender'] == '') {
            $validatedData['gender'] = null;
        }
        $users->gender = $validatedData['gender'];
        $users->tanggal_lahir = $validatedData['tanggal_lahir'];
        $users->kode_prodi = Auth::user()->kode_prodi;
        $users->save();
        return redirect(route('userList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(User $users)
    {
        return view('users/edit', [
            'user' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $validatedData = validator($request->all(), [
            'id' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['nullable', 'required', 'string'],
            'alamat' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:50'],
            'tanggal_lahir' => ['nullable', 'date'],
            'kode_prodi' => ['required', 'int']
        ])->validate();

        $users->id = $validatedData['id'];
        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
        $users->role = $validatedData['role'];
        $users->alamat = $validatedData['alamat'];
        if ($request['gender'] == '') {
            $validatedData['gender'] = null;
        }
        $users->gender = $validatedData['gender'];
        $users->tanggal_lahir = $validatedData['tanggal_lahir'];
        $file = $request->file('profileUser');
        $extension = $file->getClientOriginalExtension();
        $filename = $users -> id . '.' . $extension;
        if ($users -> profile != NULL){
            unlink('img/' . $users -> profile);
        }
        $file->move('img/', $filename);
        $users -> profile = $filename;
        $users->kode_prodi = $validatedData['kode_prodi'];
        $users->save();
        return redirect(route('userList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $users->delete();
        return redirect(route('userList'));
    }

    public function changePasswordEdit(User $users)
    {
        return view('users/changePassword', [
            'user' => $users
        ]);
    }

    public function changePasswordUpdate(Request $request, User $users)
    {
        $validatedData = validator($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ])->validate();

        $users->password = Hash::make($validatedData['password']);
        $users->save();
        if (Auth::user()->role == 'Admin') {
            return view('users/edit', [
                'user' => $users
            ]);
        } else {
            $data = DB::table('users')
                ->select('*')
                ->where('users.id', Auth::user()->id)
                ->get();
            return view('UserMahasiswa.index', [
                'UserMahasiswa' => $data
            ]);
        };
    }
}
