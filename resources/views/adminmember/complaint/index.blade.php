@extends('layouts.member')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Keluhan</h2>
</div>
</div>
<section class="panel panel-primary">
    <header class="panel-heading">
        <div class="panel-actions">
            {{-- <a class="mb-xs mt-xs mr-xs modal-basic btn btn-success" href="#modalForm">Success</a>
            <a clas
            s="modal-with-form btn btn-default" href="#modalForm">Open Form</a>
            <button t mt-xs mr-xs btn btn-success" onclick="modalForm()"><i class="fa fa-plus"></i> Tambah</button> 
            l-with-form btnpublish-default--}}
            
            {{-- <a href="#" class="fa fa-times"></a> --}}
        </div>
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('complaintusers.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Keluhan</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama</th>
                    <th width="20%">Gambar</th>
                    <th width="15%">Tanggal</th>
                    <th width="20%">Keluhan</th>
                    <th width="20%">Status</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $p => $complaint)
                @php
                setlocale (LC_TIME, 'ID');
                $date = strftime( "%d %B %Y", strtotime($complaint->date));
                @endphp
                <tr>
                    <td>{{ $p+1 }}</td>
                    <td>{{ $complaint->user->name }}</td>
                    <td><center><img src="{{ asset('storage/'.$complaint->image) }}" class="rounded mx-auto d-block" width="70"></center></td>
                    <td>{{ $date }}</td>
                    <td>{{ $complaint->complaint }}</td>
                    <td>
                        @if ($complaint->statuscomplaint == 0)
                        <button type="link" value="0" class="btn btn-danger btn-sm">Belum DiProses</button>
                        @elseif ($complaint->statuscomplaint == 1)
                        <button onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-warning btn-sm">Proses</button>
                        @else
                        <button onclick="return confirm('apakah belum lunas?');" value="2" class="btn btn-success btn-sm">Selesai</button>
                        @endif
                    </td>
                    <td>
                     <center>
                        @if ($complaint->statuscomplaint == 2)
                        <button type="button" class="btn btn-danger" onclick="destroy({{$complaint->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                        @else
                        <button type="button" class="btn btn-danger" disabled="disabled" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                        @endif
                        <div class="btn-group">
                            {{-- <button type="button" class="btn btn-danger" onclick="destroy({{$complaint->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button> --}}

                            <a href="{{ route('complaintusers.edit',$complaint->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-edit"></i></a>
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
                $.post("{{ url('complaintusers') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('complaintusers') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection