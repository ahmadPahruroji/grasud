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
		<form action="{{ route('spendings.update',$spendings->id) }}" method="post">
			@method('put')
			@csrf

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('categories') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Edit Data Pengeluaran</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Item</label>
						<div class="col-sm-8">
							<select class="form-control" name="category_id">
								@foreach ($categories as $ca => $category)
								<option value="{{ $category->id }}" {{$category->id==$spendings->category_id ? 'selected':null}}>{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Qty</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" value="{{ $spendings->qty }}"  name="qty" placeholder="Tulis Disini" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jumlah Pengeluaran</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" value="{{ $spendings->total }}"  name="total" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" value="{{ $spendings->date }}"  name="date" placeholder="Tulis Disini" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Keterangan</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" name="description" placeholder="type something">{{ $spendings->description}}</textarea>
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