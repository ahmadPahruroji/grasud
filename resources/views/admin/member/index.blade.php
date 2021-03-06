@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Warga</h2>
</div>
</div>
<section class="panel panel-primary">
    <div class="row">
        <div class="col-md-12">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#popular" data-toggle="tab"><i class="fa fa-users"></i> Data Warga</a>
                    </li>
                    <li>
                        <a href="#recent" data-toggle="tab"><i class="fa fa-group"></i> Data Petugas</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="popular" class="tab-pane active">
                        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('members.create') }}"><i class="fa fa-plus"></i> Tambah</a>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Nama</th>
                                        <th width="20%">Alamat/Blok</th>
                                        <th width="15%">No HP</th>
                                        <th width="25%">Keterangan</th>
                                        <th width="25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $m => $member)
                                    <tr>
                                        <td>{{ $m+1 }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->blok }}</td>
                                        <td>{{ $member->no_hp }}</td>
                                        <td>{{ $member->description }}</td>
                                        <td>
                                           <center>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger" onclick="destroy({{$member->id}})" data-toggle="tooltip" data-placement="left" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                                                <a href="{{ route('members.edit',$member->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </center> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="recent" class="tab-pane">
                    {{-- <header class="panel-heading"> --}}
                            {{-- <div class="panel-actions">
                            </div> --}}
                            {{-- <h2 class="panel-title">Bukti Pembayaran</h2> --}}
                            <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('officers.create') }}"><i class="fa fa-plus"></i> Tambah</a>
                            {{-- <br>
                                <br> --}}
                            {{-- </header> --}}
                            <div class="panel-body">
                                <table class="table table-bordered table-striped" id="datatable-ajax">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Nama Petugas</th>
                                            <th width="20%">Foto</th>
                                            <th width="15%">No HP</th>
                                            <th width="20%">Alamat</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($officers as $o => $officer)
                                        <tr>
                                            <td>{{ $o+1 }}</td>
                                            <td>{{ $officer->name }}</td>
                                            <td><img src="{{ asset('storage/'.$officer->image) }}" class="rounded mx-auto d-block" width="70"></td>
                                            <td>{{ $officer->no_wa }}</td>
                                            <td>{{ $officer->address }}</td>
                                            <td>
                                               <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" onclick="destroys({{$officer->id}})" data-toggle="tooltip" data-placement="left" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                                                    <a href="{{ route('officers.edit',$officer->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </center> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(()=>{
        console.log("officer page");
    });

    const destroys = (id)=>{
        swal({
            type:"warning",
            title:"Apakah Anda Yakin?",
            text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
            showCancelButton:true,
            cancelButtonText: "Batal",
            cancelButtonColor:"#3085d6",
            confirmButtonText:"Ya, Saya Yakin!",
            confirmButtonColor:"#d33"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("{{ url('officers') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('members') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>

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
            cancelButtonColor:"#3085d6",
            confirmButtonText:"Ya, Saya Yakin!",
            confirmButtonColor:"#d33"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("{{ url('members') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('members') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>


@endsection