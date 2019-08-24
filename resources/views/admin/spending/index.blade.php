@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Pengeluaran</h2>
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
        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('spendings.create') }}"><i class="fa fa-plus"></i> Tambah</a>
        <h2 class="panel-title">Pengeluaran</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Item</th>
                    <th width="10%">Qty</th>
                    <th width="20%">Jumlah Pengeluaran</th>
                    <th width="15%">Tanggal</th>
                    <th width="15%">Keterangan</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spendings as $s => $spending)
                @php
                                    setlocale (LC_TIME, 'ID');
                                    $date = strftime( "%d %B %Y", strtotime($spending->date));

                                    // Rupiah //
                                    $rupiah = "Rp " . number_format($spending->total,2,',','.');
                                    @endphp
                    <tr>
                        <td>{{ $s+1 }}</td>
                        <td>{{ $spending->category->name }}</td>
                        <td>{{ $spending->qty }}</td>
                        <td>{{ $rupiah }}</td>
                        <td>{{ $date }}</td>
                        <td>{{ $spending->description }}</td>
                        <td>
                         <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger" onclick="destroy({{$spending->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                
                                <a href="{{ route('spendings.edit',$spending->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
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
                $.post("{{ url('spendings') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('spendings') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection