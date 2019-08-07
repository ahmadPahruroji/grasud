<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\User;
use App\Biodata;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data["roles"] = Role::get();
        $data['users'] = User::with('role')->get();
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/user.index', $data, $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["roles"] = Role::get();
        $name['user'] = User::with('role')->find(Auth::user()->id);
        return view('admin/user.create', $data, $name);
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
        // $user = new User;
        // if($request->hasFile('avatar')){
        //     $path = $request->file('avatar')->store('uploads/avatars');
        //     $user->avatar = $path;
        // }
        // $user->fill($request->all());
        // $user->save();

        // $validator = \Validator::make($request->all(), [
        //     'role_id' => 'required',
        //     'name' => 'required',
        //     'image' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }

        $user = new User();
        $user->fill($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('user');
            $user->image = $path;    
        }
        $user->save();
        return redirect('users');
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
        $data["users"] = User::find($id);
       $data['roles'] = Role::get();
       $name['user'] = User::with('biodata')->find(Auth::user()->id);
       return view('admin/user.edit', $data, $name);
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
        // dd($request);
        $user = User::find($id);
        $user->fill($request->all());
        if($request->hasFile('image')){
            $path = $request->file('image')->store('user');
            $file = Storage::delete($user->image);
            $user->image = $path;
            // dd("yey",$user);
        }
        // dd("stop",$user);
        $user->update();

       return redirect()->route('users.index');
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
        $data = User::find($id)->delete();
        return response()->json($data);
    }
}
