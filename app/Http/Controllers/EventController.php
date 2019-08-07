<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['events'] = Event::orderBy('created_at','desc')->get();
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/event.index', $data, $name);
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
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/event.create',$data, $name);
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
        $event = new Event();
        $event->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('foto');
            $event->image = $path;    
        }
        $event->save();

        return redirect('events');
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
        $data["events"] = Event::find($id);
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/event.edit', $data, $name);
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
        $event = Event::find($id);
        $event->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('event');
            $file = Storage::delete($event->image);
            $event->image = $path;    
        }
        $event->update();
             // dd($productimage);
        return redirect('events');
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
        $data = Event::find($id)->delete();
        return response()->json($data);
    }

    // ///
    public function publish(Request $request, $id){
        $publish = Event::findOrFail($id);
        if($publish->publish == 0 || null){
            $publish->publish = $request->publish = 1;
            $publish->save();
            return redirect('events');
        }
        else
        {
            $publish->publish = $request->publish = 0;
            $publish->save();
            return redirect('events');
        }
    }
}
