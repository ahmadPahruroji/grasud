@extends('layouts.admin')
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
        {{-- <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('countributions.create') }}"><i class="fa fa-plus"></i> Tambah</a> --}}
        <h2 class="panel-title">Iuran Warga</h2>
    </header>
    <div class="panel-body">
    	<table id="example" class="table table-bordered display nowrap">
    		<thead>
    			<tr>
    				<th width="5%">No</th>
    				<th width="20%">Nama</th>
    				<th width="15%">Jumlah Iuran</th>
    				<th width="15%">Tanggal</th>
    				<th width="15%">Bulan</th>
                    <th width="15%">Tahun</th>
    				<th width="15%">Status</th>
    				{{-- <th width="25%">Aksi</th> --}}
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
    					<span class="label radius-circle float-left">
                            @if ($countribution->status == 0)
                            <button type="link" value="0" class="btn btn-danger btn-sm">belum lunas</button>
                            @else
                            <button onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-success btn-sm">Lunas</button>
                        @endif</span>
                    </td>
    				{{-- <td>
    					<center>
    						<div class="btn-group">
    							<button type="button" class="btn btn-danger" onclick="destroy({{$countribution->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

    							<a href="{{ route('countributions.edit',$countribution->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
    						</div>
    					</center> 
    				</td> --}}
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
				$.post("{{ url('reports') }}/"+id,access)
				.done(res=>{
					console.log(res);
					swal({
						title:"Berhasil!",
						text:"Anda Berhasil Menghapus Data",
						type:"success"
					}).then(result=>{
						window.location = "{{ url('reports') }}";
					})
				}).fail(err=>{
					console.log(err);
				}); 
			}
		});
	}

</script>
@endsection