@extends('layouts.front')
@section('content')
<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li class="active"><a href="{{ asset('/app') }}" >Annonces</a></li>
                        <li><a href="{{ asset('app/messages') }}">Messages</a></li>
                        <li><a href="{{ asset('/favorite') }}" >Favoris</a></li>
                        <li ><a href="{{ asset('/app/notifications') }}" >Notifications</a></li>
                        <li><a href="{{ asset('/app/profile') }}">Profil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
            <a href="{{ asset('/app/announcement/create') }}" type="button" class="main-btn">Ajouter une annonce</a>
    </div>

</section>
 <!--====== Start Shop-List section ======-->
 <section class="shop-list-section shop-list-sidebar shop-grid-sidebar  pb-80 light-bg pt-10">
    <div class="container">
        <div class="text-center">
        <p>Vous avez <b>({{ $count_announcement }})</b> annonce(s) !</p>
        </div>
        <div class="alert alert-success mt-3" role="alert" id="successMsg" style="display:none;" >
            L'annonce a été bien supprimé!
         </div>
        <div class="row mt-4">
            <div class="col-lg-12">
               <table class="table">
                    <tbody>
                        @foreach($announcements as $announcement)
                        <tr style="background-color:#ffff">
                            <th scope="row"> <img style="with:100px;height:100px" src="{{ asset('storage/images/properties/'.$announcement->images[0]->link) }}" class="img-fluid img-thumbnail" alt="Sheep"></th>
                            <td style="vertical-align: middle;">{{ $announcement->designation }}</td>
                            <td id="td-status-{{$announcement->id}}" style="vertical-align: middle;">@if($announcement->status == 0) En attente @elseif($announcement->status == 1) Validé @elseif($announcement->status == 3)Supprimé @else Annuler @endif</td>
                            @if($announcement->status !=3)
                            <td style="vertical-align: middle;">
                                <a href="{{ asset('announcement/'.$announcement->slug) }}" class=" btn-xs sharp mr-1 "><i class="fa fa-eye"></i></a>
                                <a href="{{ asset('app/announcement/'.$announcement->id.'/edit') }}" class=" btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                <button  style="background-color: #ffff;" class="delete" data-id="{{ $announcement->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                            @else
                            <td></td>
                            @endif

                        </tr>

                        <tr style="padding:3px;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modal-delete-show">

    </div>
</section>
<!--====== End Shop-List section ======-->
@endsection

@push('modal-delete-script')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".delete").click(function() {
   var id = $(this).data('id');
   $.ajax({
      url: '/show-model-delete/'+id ,
      type: "GET",
      success: function (res) {
        $('#modal-delete-show').html(res);
        //$('#modal-delete-show').find("#status").selectpicker();
        $("#modal-delete").modal('show');
      }
    });

  });
  </script>

<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#modal-delete-show").on('click','#store-information',function(e){
          e.preventDefault();
          let id = $('#announcement').val();
          let checked = $('input[name="exampleRadios"]:checked').val();
          $.ajax({
            type:"Post",
            url: '/store-feedback',
            data:{
              "_token": "{{ csrf_token() }}",
              id:id,
              checked:checked,
            },
            success:function(response){
              $('#modal-delete').modal('hide');
              $('#modal-delete-show').find('#successMsg').show();
              $("#td-status-"+id).html('Supprimé');
              $("#successMsg").slideDown(200).delay(3500).slideUp(200);
            },

            });

     });
  </script>
@endpush
