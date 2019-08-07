<?php

namespace App\Http\Controllers\Member;

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
        $data['complaints'] = Complaint::with('user')->orderBy('created_at','desc')->where('user_id',Auth::user()->id)->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);

        return view('adminmember/complaint.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["users"] = User::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);

        return view('adminmember/complaint.create',$data, $name);
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
        $complaint = new Complaint();
        $complaint->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('complaint');
            $complaint->image = $path;    
        }
        $complaint->save();

        return redirect('complaintusers');
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
        $data['complaints'] = Complaint::find($id);
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('adminmember/complaint.edit',$data, $name);
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
        $complaint = Complaint::find($id);
        $complaint->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('complaint');
            $file = Storage::delete($complaint->image);
            $complaint->image = $path;    
        }
        $complaint->update();
             // dd($productimage);
        return redirect('complaintusers');
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
        $data = Complaint::find($id)->delete();
        return response()->json($data);
    }

    public function status(Request $request, $id){
        $status = Complaint::findOrFail($id);
        if($status->statuscomplaint == 0 || null){
            $status->statuscomplaint = $request->statuscomplaint = 1;
            $status->save();
            return redirect('complaintusers');
        }
        else if($status->statuscomplaint == 1){
            $status->statuscomplaint = $request->statuscomplaint = 2;
            $status->save();
            return redirect('complaintusers');
        }
        else
        {
            $status->statuscomplaint = $request->statuscomplaint = 0;
            $status->save();
            return redirect('complaintusers');
        }
    }
}
