<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Spending;
use App\Countribution;
use PDF;
class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["spendings"] = Spending::with('category')->orderBy('created_at','desc')->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/spending.index',$data, $name);
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
        $data["categories"] = Category::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admin/spending.create',$data, $name);
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
        $spending = new Spending;
        $spending->fill($request->all());
        // $biodata->user_id = Auth::user()->id;
        $spending->save();

        return redirect()->route('categories.index', $spending);
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
        $data["spendings"] = Spending::find($id);
        $data["users"] = User::get();
        $data["categories"] = Category::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admin/spending.edit', $data, $name);
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
        $spending = Spending::find($id);
        $spending->fill($request->all());
        $spending->update();

        return redirect()->route('categories.index');
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
        $data = Spending::find($id)->delete();
        return response()->json($data);
    }
}
