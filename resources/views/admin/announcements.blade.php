@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Annonces</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Annonces</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">La table des annonces</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Designation</th>
                                    <th>Vendeur</th>
                                    <th>Catégorie</th>
                                    <th>Type</th>
                                    <th>Statut </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                               @foreach($announcements as $announcement)
                                <tr >
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $announcement->designation }}</td>
                                    <td>{{ $announcement->user->first_name }} {{ $announcement->user->last_name }}</td>
                                    <td>{{ $announcement->category->designation }}</td>
                                    <td>@if($announcement->type == 0) Vente @else Location @endif</td>
                                    @if($announcement->status == 0)
                                    <td id="td-status-{{$announcement->id}}"><span class="badge badge-warning">En attente</span></td>
                                    @elseif($announcement->status == 1)
                                    <td  id="td-status-{{$announcement->id}}"><span class="badge badge-success">Validé</span></td>
                                    @elseif($announcement->status == 3)
                                    <td  id="td-status-{{$announcement->id}}"><span class="badge badge-info">Supprimé</span></td>
                                    @else
                                    <td  id="td-status-{{$announcement->id}}"><span class="badge badge-danger">Annuler</span></td>
                                    @endif
                                    <td>
                                        <form action="" method="post">
                                         <div class="d-flex">
                                            <a href="{{ asset('announcement/'.$announcement->slug) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                            @if($announcement->status != 3)
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-status"data-id="{{ $announcement->id }}"><i class="fa fa-pencil"></i></a>
                                            @endif

                                        </div>
                                        </form>
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
</div>
<div id="show-modal-edit-status">

</div>
<div id="div1"></div>
@endsection
@push('modal-edit-status-announcement-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".edit-status").click(function() {
 var id = $(this).data('id');
 $.ajax({
    url: '/edit-status-announcement/'+id ,
    type: "GET",
    success: function (res) {
      $('#show-modal-edit-status').html(res);
      $('#show-modal-edit-status').find("#status").selectpicker();
      $("#basicModal2").modal('show');
    }
  });

});
</script>
@endpush
@push('modal-update-status-announcement-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#show-modal-edit-status").on('click','#save-status',function(e){
        $('#loading-indicator').show();
          e.preventDefault();
          let status = $('#status').val();
          let id =  $('#announcement').val();
          $.ajax({

            type:"POST",
            url: "/update-status-announcement/"+id,
            data:{
              "_token": "{{ csrf_token() }}",
              status:status,

             },

            success:function(response){
            $('#loading-indicator').hide();
             $('#basicModal2').modal('hide');
             toastr.success("Statut modifié avec succès", "Succès", {
                      timeOut: 5e3,
                      closeButton: !0,
                      debug: !1,
                      newestOnTop: !0,
                      progressBar: !0,
                      positionClass: "toast-top-right",
                      preventDuplicates: !0,
                      onclick: null,
                      showDuration: "300",
                      hideDuration: "1000",
                      extendedTimeOut: "1000",
                      showEasing: "swing",
                      hideEasing: "linear",
                      showMethod: "fadeIn",
                      hideMethod: "fadeOut",
                      tapToDismiss: !1

              });
              if(status == 0){
                $("#td-status-"+id).html('<span  class="badge badge-warning">'+'En Attente'+'</span>');
              }
               else if(status == 1){
                $("#td-status-"+id).html('<span class="badge badge-success">'+'Validé'+'</span>');
              }

              else{
                $("#td-status-"+id).html('<span class="badge badge-danger">'+'Annuler'+'</span>');
              }
            },

            });

     });
  </script>
  @endpush
