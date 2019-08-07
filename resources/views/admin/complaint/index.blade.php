@extends('layouts.admin')
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
        {{-- <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('complaints.create') }}"><i class="fa fa-plus"></i> Tambah</a> --}}
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
                    {{-- <th width="25%">Aksi</th> --}}
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
                    <td><span>
                    <form action="{{ route('complaints.status', $complaint->id) }}" method="post">
                      @csrf
                      @if ($complaint->statuscomplaint == 0)
                      <button type="link" onclick="return confirm('apakah mau di proses?');" value="0" class="btn btn-danger btn-sm"><b>Belum proses</b></button>
                      @elseif ($complaint->statuscomplaint == 1)
                      <button type="link" onclick="return confirm('apakah sudah di proses?');" value="1" class="btn btn-primary btn-sm"><b>proses</b></button>
                      @else
                      <button type="link" onclick="return confirm('apakah belum di proses?');" value="2" class="btn btn-success btn-sm"><b>selesai</b></button>
                      @endif
                    </form></span></td>
                      
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
                $.post("{{ url('complaints') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('complaints') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection