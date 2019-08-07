@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Pengeluaran</h2>
</div>
</div>
<section class="panel panel-primary">
    <div class="row">
        <div class="col-md-12">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#popular" data-toggle="tab"><i class="fa fa-list-alt"></i> Kategori Pengeluaran</a>
                    </li>
                    <li>
                        <a href="#recent" data-toggle="tab"><i class="fa fa-list-alt"></i> Pengeluaran</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="popular" class="tab-pane active">
                        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Tambah</a>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Nama</th>
                                        <th width="15%">Keterangan</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $ca => $category)
                                    <tr>
                                        <td>{{ $ca+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                           <center>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger" onclick="destroy({{$category->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                                                <a href="{{ route('categories.edit',$category->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
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
                    <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('spendings.create') }}"><i class="fa fa-plus"></i> Tambah</a>
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
                                <tr>
                                    <td>{{ $s+1 }}</td>
                                    <td>{{ $spending->category->name }}</td>
                                    <td>{{ $spending->qty }}</td>
                                    <td>{{ $spending->total }}</td>
                                    <td>{{ $spending->date }}</td>
                                    <td>{{ $spending->description }}</td>
                                    <td>
                                     <center>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" onclick="destroys({{$spending->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                                            <a href="{{ route('spendings.edit',$spending->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
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
                $.post("{{ url('categories') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('categories') }}";
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

    const destroys = (id)=>{
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
                        window.location = "{{ url('categories') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
@endsection