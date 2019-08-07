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
    
        </div>
        
        <h2 class="panel-title">Pengeluaran</h2>
    </header>
    <form method='post' action="{{ route('/export.show') }}">
            @csrf
            <div class="panel-body">
                <div class="col col-md-12">
      <div class="row form-group">
         <div class="col col-md-2"><label for="text-input" class="form-control-label">Tanggal Dari</label></div>
          <div class="col-12 col-md-10">
            <input type="date" id="tgl_dari" name="tgl_dari" class="form-control" required="required">
          </div>
      </div>
      <div class="row form-group">
        <div class="col col-md-2"><label for="text-input" class="form-control-label">Sampai Tanggal</label></div>
          <div class="col-12 col-md-10"><input type="date" id="tgl_sampai" name="tgl_sampai" class="form-control" required="required"></div>
      </div>
   <br>
       <button type="submit" class="btn btn-info center-block btn-block"><i class="fa fa-zoom"></i> Cari</button> 
   </div>
   </div>
    </form>
    {{-- <div class="panel-body">
        <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Item</th>
                    <th width="10%">Qty</th>
                    <th width="20%">Jumlah Pengeluaran</th>
                    <th width="15%">Tanggal</th>
                    <th width="15%">Keterangan</th>
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
                                <button type="button" class="btn btn-danger" onclick="destroy({{$spending->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                
                                <a href="{{ route('spendings.edit',$spending->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-gear"></i></a>
                            </div>
                        </center> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
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