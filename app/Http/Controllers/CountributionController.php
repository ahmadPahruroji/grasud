<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Member;
use App\Money;
use App\Payment;
use App\Status;
use App\Countribution;
// use App\Exports\SiswaExport;
use App\Imports\CountributionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
class CountributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["countributions"] = Countribution::with('user','member')->where('status',1)->orderBy('updated_at','desc')->get();
        $data["paid"] = Countribution::with('user','member')->where('status',0)->orderBy('created_at','desc')->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/countribution.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);
 
        // import data
        Excel::import(new CountributionImport, public_path('/file_siswa/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Iuran Berhasil DiImport!!!!!! :)');
 
        // alihkan halaman kembali
        return redirect('countributions');
    }

    public function create()
    {
        //
        $data["users"] = User::where('role_id',2)->get();
        $data["members"] = Member::get();
        // $data["money"] = Money::get();
        // $data["payments"] = Payment::get();
        // $data["statuses"] = Status::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/countribution.create',$data, $name);
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
        // foreach ($request['countributions'] as $c => $countribution) {
        //     $db = new Countribution;
        //     $db->fill($countribution);
        //     $db->save();
        // }
        // return redirect('countributions');
        foreach ($request->month as $month) {
            # code...
            $countribution = new Countribution;
            $countribution->fill($request->all());
            $countribution->month = $month;
            $countribution->save();
        }
        

        return redirect()->route('countributions.index', $countribution);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data["countributions"] = Countribution::find($id);
        $data["users"] = User::get();
        $data["members"] = Member::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/countribution.edit', $data, $name);
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
        $countribution = Countribution::find($id);
        $countribution->fill($request->all());
        $countribution->update();

        return redirect()->route('countributions.index');
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
        $data = Countribution::find($id)->delete();
        return response()->json($data);
    }

    public function status(Request $request, $id){
        $status = Countribution::findOrFail($id);
        if($status->status == 0 || null){
            $status->status = $request->status = 1;
            $status->save();
            return redirect()->route('countributions.index');
        }
        else
        {
            $status->status = $request->status = 0;
            $status->save();
            return redirect()->route('countributions.index');
        }
    }
}
