<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Member;
use App\Category;
use App\Spending;
use App\Countribution;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["countributions"] = Countribution::with('user','member')->orderBy('created_at','desc')->get();
        $data["users"] = User::where('role_id',2)->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/report.index', $data, $name);
    }
    ////


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tampil(Request $request)
    {
        $from = $request['tgl_dari'];
        $until = $request['tgl_sampai'];
        $nama = $request['nama'];
        $data["users"] = User::where('role_id',2)->get();
        $data["countributions"] = Countribution::with('user','member')->whereBetween('date',[$from,$until])->where('user_id', [$nama])->get();
        $use["users"] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/report.tampil',$data,$use);
    }

    public function show(Request $request)
    {
        //
        $dari = $request['tgl_dari'];
        $sampai = $request['tgl_sampai'];
        $data["spendings"] = Spending::with('category')->whereBetween('date',[$dari, $sampai])->get();
        $total["countributions"] = Countribution::where('status',1)->sum('money');
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        // dd($data);
        return view('admin/report.show',$data,$total,$name);
    }

    public function bulanan(Request $request)
    {
        $bulan = $request['bulan'];
        $tahun = $request['tahun'];
        $data["users"] = User::where('role_id',2)->get();
        $data["countributions"] = Countribution::with('user','member')->where('month',[$bulan])->where('year', [$tahun])->where('status',1)->get();
        $user["users"] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/report.bulanan',$data,$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // 
    public function export()
    {
        $data["spendings"] = Spending::with('category')->get();
        $total["spend"] = Spending::sum('total');
         $data["spend"] = Spending::get();
         $total["countributions"] = Countribution::sum('money');
         $data["countributions"] = Countribution::get();
        return view('admin/report.export',$total,$data);   
    }
    // 
    public function iuran()
    {
        $data["countributions"] = Countribution::with('user','member')->where('status',1)->orderBy('created_at','desc')->get();
        // $data["users"] = User::where('role_id',2)->get();
        // $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/report.iuran', $data);   
    }
}
