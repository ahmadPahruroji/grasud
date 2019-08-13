@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Petugas</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('officers.update',$officers->id) }}" enctype="multipart/form-data" files="true" method="post">
			@method('put')
			@csrf

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('members') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Edit Data Petugas</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Petugas</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="{{ $officers->name }}"  name="name" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<img src="{{ asset('storage/'.$officers->image) }}" class="rounded mx-auto d-block" width="50">
								<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nomor HP/WA</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="{{ $officers->no_wa }}"  name="no_wa" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Alamat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="{{ $officers->address }}"  name="address" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Keterangan</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $officers->description}}</textarea>
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