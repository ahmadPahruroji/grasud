@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Pengguna</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('users.update',$users->id) }}" enctype="multipart/form-data" files="true" method="post">
			@method('put')
			@csrf

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('users') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Edit Data Pengguna</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Hak Akses</label>
						<div class="col-sm-8">
							<select class="form-control" name="role_id">
								@foreach ($roles as $r => $role)
								<option value="{{ $role->id }}" {{$role->id==$users->role_id ? 'selected':null}}>{{ $role->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="{{ $users->name }}"  name="name" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<center><img src="{{ asset('storage/'.$users->image) }}" class="rounded mx-auto d-block" width="50"></center>
								<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" value="{{ $users->email }}"  name="email" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" value="{{ $users->password }}"  name="password" placeholder="Tulis Disini" required>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<button type="submit" class="btn btn-success pull-right">Submit</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</footer>
			</section>
		</form>
	</div>

	<div class="col-md-2">
		{{--  --}}
	</div>
</div>
@endsection