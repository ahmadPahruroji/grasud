@extends('layouts.admin')

@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Dashboard</h2>
</div>
</div>

<section>
    <div class="col-md-12 col-lg-12 col-xl-4">
        {{-- <h5 class="text-semibold text-dark text-uppercase mb-md mt-lg">Dashboard</h5> --}}
        <div class="row">
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-primary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Iuran</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            <?php
                                            function format_uang($angka){
                                                $hasil = "Rp. " . number_format($angka,2,',','.');
                                                return $hasil;
                                            }
                                            echo format_uang($total);

                                            ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('countributions') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-warning">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Pengeluaran</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            <?php
                                            function format_duit($angka){
                                                $hasil = "Rp. " . number_format($angka,2,',','.');
                                                return $hasil;
                                            }
                                            echo format_duit($luaran);

                                            ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('spendings') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-info">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Sisa Saldo</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            @php
                                            function format_money($angka){
                                                $hasil = "Rp. " . number_format($angka,2,',','.');
                                                return $hasil;
                                            }
                                            function pengurangan($a, $b){
                                                $kurang= $a-$b;
                                                return $kurang;
                                            }
                                            @endphp

                                            {{ format_money(pengurangan($total,$luaran)) }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('countributions') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-secondary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Pengguna</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            {{$users->count()}}
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('users') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-tertiary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-group"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Warga</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            {{$member->count()}}
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('member') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-xl-12">
                <section class="panel">
                    <div class="panel-body bg-quartenary">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Total Petugas</h4>
                                    <div class="info">
                                        <strong class="amount">
                                            {{$officer->count()}}
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('officers') }}" class="text-uppercase">(Lihat Data)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div id="chartiuran"></div>
    </div>
</section>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
{{--  --}}
<script type="text/javascript">
    Highcharts.chart('chartiuran', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Laporan Data Iuran Warga'
        },
        subtitle: {
            text: 'Grafik Iuran Warga'
        },
        xAxis: {
            categories: {!! json_encode($bulan) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Iuran'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Iuran',
            data: [75000,50000],

        }]
    });
</script>
{{--  --}}
<script type="text/javascript">
    $(()=>{
        if({!! $login !!}){
            swal("Selamat Datang :)","Anda Login Sebagai Admin","success");
        }
    });
</script>
@endsection
