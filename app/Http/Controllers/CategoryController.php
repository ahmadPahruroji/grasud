<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Category;
use App\Spending;
use App\Countribution;
use PDF;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["categories"] = Category::get();
        $data["spendings"] = Spending::with('category')->orderBy('created_at','desc')->get();
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/category.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/category.create', $name);
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
        $categori = new Category;
        $categori->fill($request->All());
        $categori->Save();

        return redirect('categories');
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
        $data["categories"] = Category::find($id);
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('admin/category.edit', $data, $name);
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
        $categori = Category::find($id);
        $categori->fill($request->all());
        $categori->update();

        return redirect('categories');
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
        $data = Category::find($id)->delete();
        return response()->json($data);
    }
}
