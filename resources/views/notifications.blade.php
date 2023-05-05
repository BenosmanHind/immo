@extends('layouts.front')
@section('content')
<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li ><a href="{{ asset('/app') }}" >Annonces</a></li>
                        <li><a href="{{ asset('app/messages') }}">Messages</a></li>
                        <li><a href="{{ asset('/favorite') }}" >Favoris</a></li>
                        <li class="active"><a href="{{ asset('/app/notifications') }}" >Notifications</a></li>
                        <li><a href="{{ asset('/app/profile') }}">Profil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
 <!--====== Start Shop-List section ======-->
 <section class="shop-list-section shop-list-sidebar shop-grid-sidebar  pb-80 light-bg pt-10">
    <div class="container">
        <div class="text-center">
        @if($count_notification >0 )
        <p id="p" style="display : block;">Vous avez <b id="b">({{ $count_notification }})</b> notification(s) !</p>
        <h6 id="h1"style="display : none;" class="mt-4">Vous n'avez aucune notification !</h6>
        @else
        <h6 id="h" class="mt-4">Vous n'avez aucune notification !</h6>
        @endif
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <table class="table">
                        <tbody>
                            @foreach($notifications as $notification)
                            <tr id="line-{{$notification->id}}" style="background-color:#ffff">
                                <th scope="row"> <img style="with:100px;height:100px" src="{{ asset('storage/images/properties/'.$notification->property->images[0]->link) }}" class="img-fluid img-thumbnail" alt="Sheep"></th>
                                <td style="vertical-align: middle;">Une nouvelle annonce correspondant à votre recherche a été publiée le {{ $notification->created_at->format('d-m-y') }}.</td>
                                <td style="vertical-align: middle;">
                                <a href="{{ asset('announcement/'. $notification->property->slug) }}" class=" btn-xs sharp mr-1 "><i class="fa fa-eye"></i></a>
                                <a style="cursor: pointer" style="background-color: #ffff;" class="delete-line" data-id="{{ $notification->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr style="padding:3px;">
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

</section>
<!--====== End Shop-List section ======-->
@endsection

@push('delete-line')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $( ".delete-line" ).click(function() {
        var id = $(this).attr("data-id");
        var item = $('#line-'+id).val();

        $.ajax({
			url: '/app/notifications/'+id ,
			type: 'DELETE',
            data: {
            "id": id,
            "_token": "{{ csrf_token() }}",
        },
            success: function (res) {

              $("#line-"+id).css("display", "none");
              if(res == 0){
                    $("#p").css("display", "none");
                    $("#h1").css("display", "block");

                }
                else{
                    $("#b").text(res);
                }

           }
		});
});
</script>
@endpush
