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
                                            echo format_uang($countributions);

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
                                            {{$members->count()}}
                                        </strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ url ('members') }}" class="text-uppercase">(Lihat Data)</a>
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
                                            {{$officers->count()}}
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
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(()=>{
        if({!! $login !!}){
            swal("Selamat Datang :)","Anda Login Sebagai Admin","success");
        }
    });
</script>
@endsection
