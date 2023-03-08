@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Clients</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Clients</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">La table des clients</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Téléphone </th>
                                    <th>Statut </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                               @foreach($customers as $customer)
                                <tr >
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    @if($customer->status == 0)
                                    <td id="td-status-{{$customer->id}}"><span class="badge badge-warning">En attente</span></td>
                                    @elseif($customer->status == 1)
                                    <td id="td-status-{{$customer->id}}"><span class="badge badge-success">Validé</span></td>
                                    @else
                                    <td id="td-status-{{$customer->id}}"><span class="badge badge-danger">Annuler</span></td>
                                    @endif
                                    <td>
                                        <form action="" method="post">
                                         <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit-status" data-id="{{ $customer->id }}"><i class="fa fa-pencil"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
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
@endsection
@push('modal-edit-status-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".edit-status").click(function() {
 var id = $(this).data('id');
 $.ajax({
    url: '/edit-status/'+id ,
    type: "GET",
    success: function (res) {
      $('#show-modal-edit-status').html(res);
      $('#show-modal-edit-status').find("#status").selectpicker();
      $("#basicModal").modal('show');
    }
  });

});
</script>
@endpush
@push('modal-update-status-scripts')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#show-modal-edit-status").on('click','#save-status',function(e){

          e.preventDefault();
          let status = $('#status').val();
          let id =  $('#customer').val();
          $.ajax({

            type:"POST",
            url: "/update-status/"+id,
            data:{
              "_token": "{{ csrf_token() }}",
              status:status,

             },

            success:function(response){
             $('#basicModal').modal('hide');
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
