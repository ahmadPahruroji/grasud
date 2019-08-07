@extends('layouts.member')

@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Profile Pengguna</h2>
</div>
</div>

<section>
    <div class="col-md-12 col-lg-12 col-xl-4">
        {{-- <h5 class="text-semibold text-dark text-uppercase mb-md mt-lg">Dashboard</h5> --}}
        {{--  --}}
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
                            {{-- <img src="{{ Auth::user()->image != null ?  asset('storage/'.Auth::user()->image) : asset('storage/user/foto.png') }}" class="rounded img-responsive" alt="John Doe"> --}}
                            <div class="thumb-info-title">
                                <span class="thumb-info-inner">{{Auth::user()->name}}</span>
                                <span class="thumb-info-type">{{Auth::user()->role->name}}</span>
                            </div>
                        </div>

                        {{--  --}}

                        {{--  --}}

                        {{--  --}}

                    </div>
                </section>


                {{--  --}}

                {{--  --}}

            </div>
            <div class="col-md-8 col-lg-6">

                <div class="tabs">
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
                                                <input type="readonly" class="form-control" id="profileFirstName" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="profileLastName">Email</label>
                                            <div class="col-md-8">
                                                <input type="readonly" class="form-control" id="profileLastName" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileAddress">Address</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileAddress">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileCompany">Company</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileCompany">
                                        </div>
                                    </div> --}}
                                </fieldset>
                                {{-- <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div> --}}
                            {{-- </form> --}}
                                {{-- <div class="compose-box-footer">
                                    <ul class="compose-toolbar">
                                        <li>
                                            <a href="#"><i class="fa fa-camera"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-map-marker"></i></a>
                                        </li>
                                    </ul>
                                    <ul class="compose-btn">
                                        <li>
                                            <a class="btn btn-primary btn-xs">Post</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            {{-- </section> --}}

                            {{-- \ --}}
                        </div>
                        <div id="edit" class="tab-pane">

                            <form action="{{ route('memberusers.update',Auth::user()->id) }}" enctype="multipart/form-data" files="true" method="post">
                                @method('put')
                                @csrf
                                <h4 class="mb-xlg">Update Profile</h4>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileFirstName">Nama</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileFirstName" name="name" value="{{ $users->name }}" required="harus di isi">
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
                                        <input type="email" class="form-control" id="profileAddress" name="email" value="{{ $users->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileCompany">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="profileCompany" name="password" value="{{ $users->password }}">
                                    </div>
                                </div>
                            </fieldset>
                            {{-- <hr class="dotted tall"> --}}
                            {{--  --}}
                                {{-- <hr class="dotted tall">
                                <h4 class="mb-xlg">Change Password</h4>
                                <fieldset class="mb-xl">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="profileNewPasswordRepeat">
                                        </div>
                                    </div>
                                </fieldset> --}}
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-12 col-lg-3"> --}}

                {{--  --}}

                {{--  --}}

                {{--  --}}
            {{-- </div> --}}

        </div>
    </div>
</section>
@endsection
@section('script')
{{-- <script type="text/javascript">
    $(()=>{
        if({!! $login !!}){
            swal("Selamat Datang :)","Anda Login Sebagai Member","success");
        }
    });
</script> --}}
@endsection
