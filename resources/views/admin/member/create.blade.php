@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Warga</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('members.store') }}" method="post">
			{{ csrf_field()}}

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('members') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form Warga</h2>
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
						<label class="col-sm-4 control-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Alamat/Blok</label>
						<div class="col-sm-8">
							<input type="text" name="blok" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nomor HP</label>
						<div class="col-sm-8">
							<input type="text" name="no_hp" class="form-control" placeholder="Tulis Disini" required/>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<button type="submit" class="btn btn-success pull-right">Simpan</button>
					<button type="reset" class="btn btn-default">Batal</button>
				</footer>
			</section>
		</form>
	</div>

	<div class="col-md-2">
		{{--  --}}
	</div>
</div>
@endsection