@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Pengeluaran</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('spendings.store') }}" method="post">
			{{ csrf_field()}}
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
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('categories') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form Pengeluaran</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						{{-- <label class="col-sm-4 control-label">Tanggal</label> --}}
						<div class="col-sm-8">
							<input type="hidden" name="user_id" class="form-control" value="1" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Pengeluran</label>
						<div class="col-sm-8">
							<select class="form-control" name="category_id">
								@foreach ($categories as $cs => $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Qty</label>
						<div class="col-sm-8">
							<input type="number" name="qty" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Hanya Angka" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jumlah Pengeluaran</label>
						<div class="col-sm-8">
							<input type="number" name="total" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Hanya Angka" required/>
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