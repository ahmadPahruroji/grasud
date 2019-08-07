<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Proof;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $data["proofs"] = Proof::orderBy('created_at','desc')->where('user_id',Auth::user()->id)->get();
      $name['user'] = User::with('biodata')->find(Auth::user()->id);

      return view('adminmember/proof.index', $data, $name);
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
        return view('adminmember/proof.create',$data, $name);
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
        $proof = new Proof();
        $proof->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('proof');
            $proof->image = $path;    
        }
        $proof->save();

        return redirect('countributionusers');

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
        $dl = Proof::findOrFail($id);
        $file = public_path().'/storage/'.$dl->image;
        return response()->download($file,$dl->title);
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
        $data["proofs"] = Proof::find($id);
        $data["users"] = User::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('adminmember/proof.edit',$data, $name);
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
        $proof = Proof::find($id);
        $proof->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('proof');
            $file = Storage::delete($proof->image);
            $proof->image = $path;    
        }
        $proof->update();

        return redirect('countributionusers');
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
        $data = Proof::find($id)->delete();
        return response()->json($data);
    }
}
