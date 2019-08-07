@extends('layouts.coordinator')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
	<div class="container-fluid">
		<h2 class="h5 no-margin-bottom">Data Iuran Warga</h2>
	</div>
</div>
<section class="panel panel-primary">
	<header class="panel-heading">
		<div class="panel-actions">
            {{-- <a class="mb-xs mt-xs mr-xs modal-basic btn btn-success" href="#modalForm">Success</a>
            <a class="modal-with-form btn btn-default" href="#modalForm">Open Form</a>
            <button type="button" class="mb-xs mt-xs mr-xs btn btn-success" onclick="modalForm()"><i class="fa fa-plus"></i> Tambah</button> --}}
            
            {{-- <a href="#" class="fa fa-times"></a> --}}
        </div>
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('countributionuser.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Iuran Warga</h2>
    </header>
    <div class="panel-body">
    	<table class="table table-bordered table-striped" id="datatable-ajax">
    		<thead>
    			<tr>
    				<th width="5%">No</th>
    				<th width="15%">Nama</th>
    				<th width="15%">Jumlah Iuran</th>
    				<th width="15%">Tanggal</th>
    				<th width="15%">Bulan</th>
                    <th width="10%">Tahun</th>
    				<th width="15%">Status</th>
    				<th width="30%">Aksi</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach ($countributions as $m => $countribution)
    			@php
    			setlocale (LC_TIME, 'ID');
    			$date = strftime( "%d %B %Y", strtotime($countribution->date));

               // Rupiah //
    			$rupiah = "Rp " . number_format($countribution->money,2,',','.');
    			@endphp
    			<tr>
    				<td>{{ $m+1 }}</td>
    				<td>{{ $countribution->user->name }}</td>
    				<td style="text-align: right;">{{ $rupiah }}</td>
    				<td>{{ $date }}</td>
    				<td>{{ $countribution->month }}</td>
                    <td>{{ $countribution->year }}</td>
    				<td>
    					<form action="{{ route('countributionuser.status', $countribution->id) }}" method="post">
    						@csrf
    						@if ($countribution->status == 0)
    						<button type="link" onclick="return confirm('apakah sudah lunas?');" value="0" class="btn btn-danger btn-sm"><b>Belum Lunas</b></button>
    						@else
    						<button type="link" onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-success btn-sm"><b>Lunas</b></button>
    						@endif
    					</form>
    				</td>
    				<td>
    					<center>
    						<div class="btn-group">
    							<button type="button" class="btn btn-danger" onclick="destroy({{$countribution->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

    							<a href="{{ route('countributionuser.edit',$countribution->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
    						</div>
    					</center> 
    				</td>
    			</tr>
    			@endforeach
    		</tbody>
    	</table>
    </div>
    {{-- @include('admin/user/create') --}}
</section>
@endsection
@section('script')
<script type="text/javascript">
	$(()=>{
		console.log("user page");
	});

	const destroy = (id)=>{
		swal({
			type:"warning",
			title:"Apakah Anda Yakin?",
			text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
			showCancelButton:true,
			cancelButtonText: "Batal",
			cancelButtonColor:"#d33",
			confirmButtonText:"Ya, Saya Yakin!",
			confirmButtonColor:"#3085d6"
		}).then(result=>{
			if(result.value){
				let access = {
					id:id,
					_method:'delete',
					_token:"{{csrf_token()}}"
				}
				$.post("{{ url('countributionuser') }}/"+id,access)
				.done(res=>{
					console.log(res);
					swal({
						title:"Berhasil!",
						text:"Anda Berhasil Menghapus Data",
						type:"success"
					}).then(result=>{
						window.location = "{{ url('countributionuser') }}";
					})
				}).fail(err=>{
					console.log(err);
				}); 
			}
		});
	}

</script>
@endsection