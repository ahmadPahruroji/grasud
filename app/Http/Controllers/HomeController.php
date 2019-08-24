<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Countribution;
use App\Member;
use App\Officer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $login = request()->login ?? "false";
        $total = Countribution::where('status',1)->sum('money');
        $countribution = Countribution::all();
        $member = Member::get();
        $officer = Officer::get();
        $users = User::get();
        $user = User::with('biodata')->find(Auth::user()->id);
        // 
        $bulan = [];
        $iuran = [];
        foreach ($countribution as $cont) {
            # code...
            $bulan[] = $cont->year;
            $iuran[] = $cont->money;
        }
        // dd($bulan);
        return view('home',['login' => $login,'total' => $total,'countribution' => $countribution,'member' => $member,'officer' => $officer,'users' => $users,'user' => $user,'bulan' => $bulan,'iuran' => $iuran]);
    }
}
