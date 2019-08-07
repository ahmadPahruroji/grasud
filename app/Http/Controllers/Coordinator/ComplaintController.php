<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Complaint;
class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['complaints'] = Complaint::with('user')->orderBy('created_at','desc')->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admincoordinator/complaint.index', $data, $name);
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

    public function status(Request $request, $id){
        $status = Complaint::findOrFail($id);
        if($status->statuscomplaint == 0 || null){
            $status->statuscomplaint = $request->statuscomplaint = 1;
            $status->save();
            return redirect('complaintuser');
        }
        else if($status->statuscomplaint == 1){
            $status->statuscomplaint = $request->statuscomplaint = 2;
            $status->save();
            return redirect('complaintuser');
        }
        else
        {
            $status->statuscomplaint = $request->statuscomplaint = 0;
            $status->save();
            return redirect('complaintuser');
        }
    }
}
