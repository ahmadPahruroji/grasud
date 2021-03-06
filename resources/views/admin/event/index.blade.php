@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Kegiatan</h2>
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
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('events.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Kegiatan</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Judul</th>
                    <th width="20%">Foto</th>
                    <th width="15%">Tanggal</th>
                    <th width="20%">Keterangan</th>
                    <th width="20%">Publish</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $p => $event)
                @php
                setlocale (LC_TIME, 'ID');
                $date = strftime( "%d %B %Y", strtotime($event->date));
                @endphp
                <tr>
                    <td>{{ $p+1 }}</td>
                    <td>{{ $event->title }}</td>
                    <td><center><img src="{{ asset('storage/'.$event->image) }}" class="rounded mx-auto d-block" width="70"></center></td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->description }}</td>
                    {{-- <td>{{ $event->publish }}</td> --}}
                    <td><span>
                      <form action="{{ route('events.publish', $event->id) }}" method="post">
                          @csrf
                          @if ($event->publish == 0)
                          <button type="link" onclick="return confirm('apakah mau di publish?');" value="0" class="btn btn-danger btn-sm"><b>Belum Di Publish</b></button>
                          @else
                          <button type="link" onclick="return confirm('Tidak di publish?');" value="1" class="btn btn-success btn-sm"><b>Publish</b></button>
                          @endif
                      </form></span></td>
                      <td>
                       <center>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" onclick="destroy({{$event->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                            <a href="{{ route('events.edit',$event->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
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
                $.post("{{ url('events') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('events') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection