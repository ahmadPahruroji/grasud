<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Officer;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["officers"] = Officer::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/officer.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["officers"] = Officer::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/officer.create',$data, $name);
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
         // dd($request);
        $officer = new Officer();
        $officer->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('officer');
            $officer->image = $path;    
        }
        $officer->save();

        return redirect('members');
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
        $data["officers"] = Officer::find($id);
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admin/officer.edit', $data, $name);
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
        $officer = Officer::find($id);
        $officer->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('officer');
            $officer->image = $path;    
        }
        $officer->update();
             // dd($productimage);
        return redirect('members');
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
        $data = Officer::find($id)->delete();
        return response()->json($data);
 
    }
}
