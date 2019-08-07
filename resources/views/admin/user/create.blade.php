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
		<form action="{{ route('users.store') }}" enctype="multipart/form-data" files="true" method="post">
			@csrf
			@method('post')

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('users') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form Pengguna</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Hak Akses</label>
						<div class="col-sm-8">
							<select class="form-control" name="role_id">
								@foreach ($roles as $r => $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Gambar</label>
						<div class="col-sm-8">
							<center><img src="{{ asset('storage/user/foto.png') }}" class="rounded mx-auto d-block" width="80"></center>
							{{-- <input type="file" name="image" class="form-control"> --}}
							<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">email</label>
						<div class="col-sm-8">
							<input type="email" name="email" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" name="password" class="form-control" placeholder="Tulis Disini" required/>
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