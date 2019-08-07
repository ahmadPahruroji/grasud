<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Countribution;

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
        $data["countributions"] = Countribution::with('user')->orderBy('created_at','desc')->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admincoordinator/countribution.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["users"] = User::where('role_id',2)->get();
        // $data["members"] = Member::get();
        // $data["money"] = Money::get();
        // $data["payments"] = Payment::get();
        // $data["statuses"] = Status::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admincoordinator/countribution.create',$data, $name);
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
        // $countribution = new Countribution;
        // $countribution->fill($request->all());
        // $biodata->user_id = Auth::user()->id;
        // $countribution->save();

        foreach ($request->month as $month) {
            # code...
            $countribution = new Countribution;
            $countribution->fill($request->all());
            $countribution->month = $month;
            $countribution->save();
        }

        return redirect()->route('countributionuser.index', $countribution);
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
        // $data["members"] = Member::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admincoordinator/countribution.edit', $data, $name);
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

        return redirect()->route('countributionuser.index');
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
            return redirect()->route('countributionuser.index');
        }
        else
        {
            $status->status = $request->status = 0;
            $status->save();
            return redirect()->route('countributionuser.index');
        }
    }
}
