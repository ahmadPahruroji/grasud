@extends('layouts.member')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Bukti</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('proofusers.store') }}" enctype="multipart/form-data" files="true" method="post">
			@csrf
			@method('post')
			@php
			$tanggal = date_default_timezone_get('Asia/Jakarta'); date("Y-m-d");
			$tanggal_data = date("Y-m-d");
			$date = date("Y-m-d", strtotime($tanggal_data));
			@endphp

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('countributionusers') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form bukti</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Pengguna</label>
						<div class="col-sm-8">
							<select class="form-control" name="user_id">
								<option value="{{ $user->id }}">{{ $user->name }}</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<center><img src="{{ asset('storage/user/foto.png') }}" class="rounded mx-auto d-block" width="80"></center>
								{{-- <input type="file" name="image" class="form-control"> --}}
						<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" name="date" class="form-control" value="{{ $date }}" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Keterangan</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="description" placeholder="type something" > </textarea>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<button type="submit" class="btn btn-success pull-right">Simpan</button>
					<button type="reset" class="btn btn-default">Ulang</button>
				</footer>
			</section>
		</form>
	</div>

	<div class="col-md-2">
		{{--  --}}
	</div>
</div>
@endsection