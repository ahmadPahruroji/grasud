@extends('layouts.admin')

@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Profile Pengguna</h2>
</div>
</div>

<section>
    <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="row">
            <div class="col-md-4 col-lg-3">

                <section class="panel">
                    <div class="panel-body">
                        <div class="thumb-info mb-md">
                            @if(Auth::user()->image == '')
                            <img class="rounded img-responsive"  src="{{asset('storage/user/foto.png')}}" alt="profile image">
                            @else
                            <img class="rounded img-responsive"  src="{{asset('storage/'.Auth::user()->image)}}" alt="profile image">
                            @endif
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner">{{Auth::user()->name}}</span>
                                <span class="thumb-info-type">{{Auth::user()->role->name}}</span>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
            <div class="col-md-8 col-lg-6">

                <div class="tabs tabs-primary">
                    <ul class="nav nav-tabs tabs-primary">
                        <li class="active">
                            <a href="#overview" data-toggle="tab">View</a>
                        </li>
                        <li>
                            <a href="#edit" data-toggle="tab">Edit</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <h4 class="mb-md">Profile</h4>

                            {{-- <section class="simple-compose-box mb-xlg"> --}}
                                {{-- <form method="get" action="/"> --}}
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileFirstName">Nama</label>
                                            <div class="col-md-8">
                                                <input type="readonly" class="form-control" id="profileFirstName" readonly="readonly" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileLastName">Email</label>
                                            <div class="col-md-8">
                                                <input type="readonly" class="form-control" id="profileLastName" readonly="readonly" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    {{-- \ --}}
                                </div>
                                <div id="edit" class="tab-pane">

                                    <form action="{{ route('profiles.update',Auth::user()->id) }}" enctype="multipart/form-data" files="true" method="post">
                                        @method('put')
                                        @csrf
                                        <h4 class="mb-xlg">Update Profile</h4>
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="profileFirstName">Nama</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="profileFirstName" name="name" value="{{ $users->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="profileLastName">Foto</label>
                                                <div class="col-md-8">
                                                   <center><img src="{{ asset('storage/'.$users->image) }}" class="rounded mx-auto d-block" width="50"></center>
                                                   <input type="file" name="image" class="form-control">
                                               </div>
                                           </div>
                                           <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileAddress">Email</label>
                                            <div class="col-md-8">
                                                <input type="email" class="form-control" id="profileAddress" value="{{ $users->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileCompany">Password<i style="color:red">*</i></label>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control" id="profileCompany" name="password" value="{{ $users->password }}">
                                                <span class="help-block"><i style="color:red">*</i>Password harus diubah jika mau di Edit.</span>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-success pull-right">Ubah</button>
                                                <button type="reset" class="btn btn-default pull-right">Reset</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    @endsection
    @section('script')

    @endsection
