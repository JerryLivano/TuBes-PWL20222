<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin'){
            $data = DB::table('notification')
            -> select('*')
            -> where('notification.kode_prodi', Auth::user()->kode_prodi)
            -> get();
            return view('dashboard', [
                'triggers' => $data
            ]);
        } else {
            $data = DB::table('notification')
            -> select('*')
            -> where('notification.nrp', Auth::user()->id)
            -> get();
            return view('dashboard', [
                'triggers' => $data
            ]);
        }
    }
}
