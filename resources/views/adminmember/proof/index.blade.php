@extends('layouts.member')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Bukti</h2>
</div>
</div>
<section class="panel panel-primary">
    <header class="panel-heading">
        <div class="panel-actions">
        </div>
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('proofusers.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Bukti Pembayaran</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama</th>
                    <th width="20%">Foto</th>
                    <th width="15%">Tanggal</th>
                    <th width="20%">Keterangan</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proofs as $p => $proof)
                    <tr>
                        <td>{{ $p+1 }}</td>
                        <td>{{ $proof->user->name }}</td>
                        <td><center><img src="{{ asset('storage/'.$proof->image) }}" class="rounded mx-auto d-block" width="70"></center></td>
                        <td>{{ $proof->date }}</td>
                        <td>{{ $proof->description }}</td>
                        <td>
                         <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger" onclick="destroy({{$proof->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                
                                <a href="{{ route('proofusers.edit',$proof->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
                                <a href="{{ route('downloadfile', $proof->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="download"><i class="fa fa-gear"></i></a>
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
                $.post("{{ url('proofusers') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('proofusers') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection