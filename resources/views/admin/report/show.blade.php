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
        {{-- <a class="mb-xs mt-xs mr-xs btn btn-success pull-right" href="{{ route('spendings.create') }}"><i class="fa fa-plus"></i> Tambah</a> --}}
        <h2 class="panel-title">Pengeluaran</h2>
    </header>
    <div class="panel-body">
        <table id="example" class="display nowrap">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Item</th>
                    <th width="15%">Tanggal</th>
                    <th width="15%">Keterangan</th>
                    <th width="10%">Qty</th>
                    <th width="20%">Jumlah Pengeluaran</th>
                    {{-- <th width="25%">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($spendings as $s => $spending)
                @php
                setlocale (LC_TIME, 'ID');
                $date = strftime( "%d %B %Y", strtotime($spending->date));

                        // rupiah //
                $rupiah = "Rp " . number_format($spending->total,2,',','.');
                @endphp
                <tr>
                    <td>{{ $s+1 }}</td>
                    <td>{{ $spending->category->name }}</td>
                    <td>{{ $date }}</td>
                    <td>{{ $spending->description }}</td>
                    <td style="text-align: right;">{{ $spending->qty }}</td>
                    <td style="text-align: right;">{{ $rupiah }}</td>
                </tr>
                @endforeach
                {{--  --}}
                
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
                <tr style="color: green" bgcolor="green">
                    <th width="5%">Total Pengeluaran</th>
                    <th width="20%"></th>
                    <th width="15%"></th>
                    <th width="15%"></th>
                    <th width="10%"></th>
                    <th width="20%" style="text-align: right;">{{ format_uang( $spendings->sum('total')) }}</th>
                </tr>
                <tr style="color: blue" bgcolor="orange">
                    <th width="5%">Total Iuran</th>
                    <th width="20%"></th>
                    <th width="15%"></th>
                    <th width="15%"></th>
                    <th width="10%"></th>
                    <th width="20%" style="text-align: right;">{{ format_uang( $countributions) }}</th>
                </tr>
                <tr style="color: red" bgcolor="blue-grey">
                    <th width="5%">Total Sisa Iuran</th>
                    <th width="20%"></th>
                    <th width="15%"></th>
                    <th width="15%"></th>
                    <th width="10%"></th>
                    <th width="20%" style="text-align: right;">{{ format_uang(pengurangan($countributions,$spendings->sum('total'))) }}</th>
                </tr>
            </tbody>
            <tfoot>
                
            </tfoot>
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