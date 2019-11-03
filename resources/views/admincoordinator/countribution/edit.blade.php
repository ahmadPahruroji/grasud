@extends('layouts.coordinator')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Iuran Warga</h2>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		{{--  --}}
	</div>

	<div class="col-md-8">
		<form action="{{ route('countributionuser.update',$countributions->id) }}" method="post">
			@method('put')
			@csrf

			<section class="panel panel-primary">
				<header class="panel-heading">
					<div class="panel-actions">
						{{-- <a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a> --}}
					</div>
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('countributionuser') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Edit Data Iuran Warga</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Pengguna</label>
						<div class="col-sm-8">
							<select class="form-control" name="user_id">
								@foreach ($users as $u => $user)
								<option value="{{ $user->id }}" {{$user->id==$countributions->user_id ? 'selected':null}}>{{ $user->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Jumlah Iuran</label>
						<div class="col-sm-8">
							<select class="form-control" name="money">
								<option>{{ $countributions->money }}</option>
								<option>50000</option>
								<option>75000</option>
								<option>100000</option>
								<option>150000</option>
								<option>200000</option>
								<option>250000</option>
								<option>300000</option>
								<option>375000</option>
								<option>450000</option>
								<option>525000</option>
								<option>600000</option>
								<option>675000</option>
								<option>750000</option>
								<option>825000</option>
								<option>900000</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Metode Pembayaran</label>
						<div class="col-sm-8">
							<select class="form-control" name="payment">
								<option>{{ $countributions->payment }}</option>
								<option>Cash</option>
								<option>Tansfer</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Bulan</label>
						<div class="col-sm-8">
							<select class="form-control" name="month">
								<option>{{ $countributions->month }}</option>
								<option>Januari</option>
								<option>Februari</option>
								<option>Maret</option>
								<option>April</option>
								<option>Mei</option>
								<option>Juni</option>
								<option>Juli</option>
								<option>Agustus</option>
								<option>September</option>
								<option>Oktober</option>
								<option>November</option>
								<option>Desember</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" class="form-control" value="{{ $countributions->date }}"  name="date" placeholder="Tulis Disini" required/>
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