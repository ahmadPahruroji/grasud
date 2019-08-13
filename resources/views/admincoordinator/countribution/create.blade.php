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
		<form action="{{ route('countributionuser.store') }}" method="post">
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
					<a class="mb-xs mt-xs mr-xs btn btn-default pull-right" href="{{ url('countributionuser') }}"><i class="fa fa-arrow-left"> </i> Kembali</a>
					<h2 class="panel-title">Form Iuran Warga</h2>
					{{--  --}}
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label">Nama Warga</label>
						<div class="col-sm-8">
							<select id="pengguna" class="form-control" name="user_id">
								<option value="Tidak">--- Pilih Warga ---</option>
								@foreach ($users as $u => $user)
								<option value="{{ ($user->id) }}">{{ ($user->name) }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group" id="pilih" style="display: none;">
						<label class="col-sm-4 control-label">Jumlah Iuran</label>
						<div class="col-sm-8">
							<select class="form-control" name="money" hidden />
								<option value="50000">Rp.50000,-</option>
								<option value="75000">Rp.75000,-</option>
								
							</select>
						</div>
					</div>
					<div class="form-group" id="pilih1" style="display: none;">
						<label class="col-sm-4 control-label">Metode Pembayaran</label>
						<div class="col-sm-8">
							<select class="form-control" name="payment" hidden />
								<option>Cash</option>
								<option>Transfer</option>
							</select>
						</div>
					</div>
					<div class="form-group" id="pilih2" style="display: none;">
						<label class="col-sm-4 control-label">Bulan</label>
						<div class="col-sm-8">
							<label>
								<input type="checkbox" name="month[]" value="JANUARI"> Januari
							</label>
							<label>
								<input type="checkbox" name="month[]" value="FEBRUARI"> Februari
							</label>
							<label>
								<input type="checkbox" name="month[]" value="MARET"> Maret
							</label>
							<label>
								<input type="checkbox" name="month[]" value="APRIL"> April
							</label>
						</div>
						<div class="col-sm-4">
						</div>
						<div class="col-sm-8">
							<label>
								<input type="checkbox" name="month[]" value="MEI"> Mei
							</label>
							<label>
								<input type="checkbox" name="month[]" value="JUNI"> Juni
							</label>
							<label>
								<input type="checkbox" name="month[]" value="JULI"> Juli
							</label>
							<label>
								<input type="checkbox" name="month[]" value="AGUSTUS"> Agustus
							</label>
						</div>
						<div class="col-sm-4">
						</div>
						<div class="col-sm-8">
							<label>
								<input type="checkbox" name="month[]" value="SEPTEMBER"> September
							</label>
							<label>
								<input type="checkbox" name="month[]" value="OKTOBER"> Oktober
							</label>
							<label>
								<input type="checkbox" name="month[]" value="NOVEMBER"> November
							</label>
							<label>
								<input type="checkbox" name="month[]" value="DESEMBER"> Desember
							</label>
						</div>
					</div>
					<div class="form-group" id="pilih3" style="display: none;">
						<label class="col-sm-4 control-label">Tahun</label>
						<div class="col-sm-8">
							<select class="form-control" name="year" hidden />
								<option>2018</option>
								<option>2019</option>
								<option>2020</option>
								<option>2021</option>
								<option>2022</option>
								<option>2023</option>
								<option>2024</option>
								<option>2025</option>
								<option>2026</option>
								<option>2027</option>
								<option>2028</option>
								<option>2029</option>
								<option>2030</option>
								<option>2031</option>
								<option>2032</option>
							</select>
						</div>
					</div>
					<div class="form-group" id="mobil" style="display: none;">
						<label class="col-sm-4 control-label">Tanggal</label>
						<div class="col-sm-8">
							<input type="date" name="date" class="form-control" value="{{ $date }}" placeholder="Tulis Disini" hidden />
						</div>
					</div>
					<div class="form-group">
						{{-- <label class="col-sm-4 control-label">Tanggal</label> --}}
						<div class="col-sm-8">
							<input type="hidden" name="status" class="form-control" value="1" placeholder="Tulis Disini" required/>
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