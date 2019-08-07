@extends('layouts.member')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Kegiatan</h2>
</div>
</div>
<section class="panel">

    <div class="row">
        @foreach ($events as $p => $event)
        @php
        setlocale (LC_TIME, 'ID');
        $date = strftime( "%d %B %Y", strtotime($event->date));
        @endphp
        <div class="col-md-4" data-plugin-portlet id="portlet-1">
            <section class="panel panel-info" id="panel-1" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">{{ $event->title }}</h2>
                </header>
                <div class="panel-body">
                 <center><img data-toggle="magnify" src="{{ asset('storage/'.$event->image) }}" class="rounded mx-auto d-block" width="90">
                 </center>
             </div>
             <footer class="panel-footer" style="background-color: #2aabd2">
                 <h2 class="panel-title">{{ $date }}</h2>
             </footer>
         </section>
     </div>
     @endforeach
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