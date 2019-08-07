@extends('layouts.admin')
@section('content')
<div class="page-header" style="background-color: #2d6ca2">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Data Biodata Pengguna</h2>
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
          <a class="mb-xs mt-xs mr-xs modal-basic btn btn-success pull-right" href="#myModal" id="open"><i class="fa fa-plus"></i> Tambah</a>
          <h2 class="panel-title">Biodata Pengguna</h2>
        </header>
        <div class="panel-body">
          <table class="table table-bordered table-striped" id="datatable-ajax">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="20%">Role</th>
                <th width="25%">Nama</th>
                <th width="25%">Email</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        @include('admin/biodata/create')
      </section>
      @endsection
      @section('script')
      <script>
       jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
         e.preventDefault();
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
         jQuery.ajax({
          url: "{{ url('/biodatas') }}",
          method: 'post',
          data: {
           name: jQuery('#user_id').val(),
           club: jQuery('#name').val(),
           country: jQuery('#image').val(),
           score: jQuery('#email').val(),
           score: jQuery('#password').val(),
         },
         success: function(result){
          if(result.errors)
          {
            jQuery('.alert-danger').html('');

            jQuery.each(result.errors, function(key, value){
              jQuery('.alert-danger').show();
              jQuery('.alert-danger').append('<li>'+value+'</li>');
            });
          }
          else
          {
            jQuery('.alert-danger').hide();
            $('#open').hide();
            $('#myModal').modal('hide');
          }
        }});
       });
      });
    </script>

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
            $.post("{{ url('users') }}/"+id,access)
            .done(res=>{
              console.log(res);
              swal({
                title:"Berhasil!",
                text:"Anda Berhasil Menghapus Data",
                type:"success"
              }).then(result=>{
                window.location = "{{ url('users') }}";
              })
            }).fail(err=>{
              console.log(err);
            }); 
          }
        });
      }

    </script>
    @endsection