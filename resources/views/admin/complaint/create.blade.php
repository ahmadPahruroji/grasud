@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Keluhan</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('complaints.store') }}" enctype="multipart/form-data" files="true" method="post">
			@csrf
			@method('post')

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('complaints') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form Keluhan</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Pengguna</label>
						<div class="col-sm-8">
							<select class="form-control" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
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
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" name="date" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Keluhan</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="complaint" placeholder="type something" > </textarea>
						</div>
					</div>
					<div class="form-group">
						{{-- <label class="col-sm-4 control-label">Tanggal</label> --}}
						<div class="col-sm-8">
							<input type="hidden" name="statuscomplaint" value="0" class="form-control" placeholder="Tulis Disini" required/>
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