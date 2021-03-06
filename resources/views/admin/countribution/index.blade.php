@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Data Iuran Warga</h2>
    </div>
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $errors->first('file') }}</strong>
    </div>
    @endif

    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $sukses }}</strong>
    </div>
    @endif
</div>

<section class="panel panel-primary">
    <div class="row">
        <div class="col-md-12">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#popular" data-toggle="tab" style="color: green"><i class="fa fa-money"></i> Laporan Iuran Warga</a>
                    </li>
                    <li>
                        <a href="#recent" data-toggle="tab" style="color: red"><i class="fa fa-money"></i>  Iuran Warga Belum Lunas</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="popular" class="tab-pane active">

                        <div class="panel-body">
                            <table class="table table-bordered table-striped" id="datatable-ajax">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Nama</th>
                                        <th width="15%">Jumlah Iuran</th>
                                        <th width="15%">Tanggal</th>
                                        <th width="10%">Bulan</th>
                                        <th width="10%">Tahun</th>
                                        <th width="15%">Status</th>
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
                                            <form action="{{ route('countributions.status', $countribution->id) }}" method="post">
                                                @csrf
                                                @if ($countribution->status == 0)
                                                <button type="link" onclick="return confirm('apakah sudah lunas?');" value="0" class="btn btn-danger btn-sm"><b>Belum Lunas</b></button>
                                                @else
                                                <button type="link" onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-success btn-sm"><b>Lunas</b></button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @php
                        function format_uang($angka){
                            $hasil = "Rp. " . number_format($angka,2,',','.');
                            return $hasil;
                        }
                        function pengurangan($a, $b){
                            $kurang= $a-$b;
                            return $kurang;
                        }
                        @endphp
                        <center>
                            <h3> <b>Sisa Saldo Saat Ini</b></h3>
                            <h1>{{ format_uang(pengurangan($countributions->sum('money'),$spendings)) }}</h1>
                        </center>
                    </div>
                    {{--  --}}
                    <!-- Import Excel -->
                    <div class="modal fade modal-header-color modal-block-primary" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog" role="document">
                            <form method="post" action="/countributions/import_excel" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <label>Pilih file excel dengan format csv,xls,xlsx</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--  --}}
                    <div id="recent" class="tab-pane">
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-info pull-right" data-toggle="modal" data-target="#importExcel" data-toggle="tooltip" data-placement="bottom" title="Import Excel"><i class="fa fa-download"></i>
                        </button> 

                        <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('countributions.create') }}" data-toggle="tooltip" data-placement="left" title="Tambah Pembayaran"><i class="fa fa-plus"></i>
                        </a>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="5%">Nama</th>
                                        <th width="5%">Jumlah Iuran</th>
                                        <th width="5%">Tanggal</th>
                                        <th width="5%">Bulan</th>
                                        <th width="5%">Tahun</th>
                                        <th width="5%">Status</th>
                                        <th width="5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paid as $m => $paidoff)
                                    @php
                                    setlocale (LC_TIME, 'ID');
                                    $date = strftime( "%d %B %Y", strtotime($paidoff->date));

               // Rupiah //
                                    $rupiah = "Rp " . number_format($paidoff->money,2,',','.');
                                    @endphp
                                    <tr>
                                        <td>{{ $m+1 }}</td>
                                        <td>{{ $paidoff->user->name }}</td>
                                        <td style="text-align: right;">{{ $rupiah }}</td>
                                        <td>{{ $date }}</td>
                                        <td>{{ $paidoff->month }}</td>
                                        <td>{{ $paidoff->year }}</td>
                                        <td>
                                            <form action="{{ route('countributions.status', $paidoff->id) }}" method="post">
                                                @csrf
                                                @if ($paidoff->status == 0)
                                                <button type="link" onclick="return confirm('apakah sudah lunas?');" value="0" class="btn btn-danger btn-sm"><b>Belum Lunas</b></button>
                                                @else
                                                <button type="link" onclick="return confirm('apakah belum lunas?');" value="1" class="btn btn-success btn-sm"><b>Lunas</b></button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" onclick="destroy({{$paidoff->id}})" data-toggle="tooltip" data-placement="left" title="Hapus Data"><i class="fa fa-trash-o"></i></button>

                                                    <a href="{{ route('countributions.edit',$paidoff->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fa fa-edit"></i></a>
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
                $.post("{{ url('countributions') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('countributions') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>


@endsection