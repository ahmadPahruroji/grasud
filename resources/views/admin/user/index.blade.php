@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Pengguna</h2>
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
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Pengguna</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Role</th>
                    <th width="25%">Nama</th>
                    <th width="20%">Foto</th>
                    <th width="20%">Email</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u => $user)
                    <tr>
                        <td>{{ $u+1 }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->name }}</td>
                        <td><center><img src="{{ asset('storage/'.$user->image) }}" class="rounded mx-auto d-block" width="70"></center></td>
                        <td>{{ $user->email }}</td>
                        <td>
                         <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger" onclick="destroy({{$user->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                
                                <a href="{{ route('users.edit',$user->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
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
                $.post("{{ url('users') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('users') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection