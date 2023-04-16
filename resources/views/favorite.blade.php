@extends('layouts.front')
@section('content')
<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li ><a href="{{ asset('/app') }}" >Mes annonces</a></li>
                        <li data-filter=".cat1">Mes messages</li>
                        <li class="active"><a href="{{ asset('/favorite') }}" >Mes favoris</li>
                        <li><a href="{{ asset('/app/profile') }}"> Mon profil</a></li>
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
        @if($count_favorite_lines >0 )
        <p id="p">Vous avez <b id="b">({{ $count_favorite_lines }})</b> annonce(s) dans votre favoris !</p>
        @else
        <h6 id="h" class="mt-4">Votre favoris est vide !</h6>
        @endif
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <table class="table">
                        <tbody>
                            @foreach($favorite_lines as $favorite_line)
                            <tr id="line-{{$favorite_line->id}}" style="background-color:#ffff">
                                <th scope="row"> <img style="with:100px;height:100px" src="{{ asset('storage/images/properties/'.$favorite_line->property->images[0]->link) }}" class="img-fluid img-thumbnail" alt="Sheep"></th>
                                <td style="vertical-align: middle;">{{ $favorite_line->property->designation }}</td>
                                <td style="vertical-align: middle;">
                                <a href="{{ asset('announcement/'. $favorite_line->property->slug) }}" class=" btn-xs sharp mr-1 "><i class="fa fa-eye"></i></a>
                                <a style="cursor: pointer" style="background-color: #ffff;" class="delete-line" data-id="{{ $favorite_line->id }}"><i class="fa fa-trash"></i></a>
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
			url: '/favorite/'+id ,
			type: 'DELETE',
            data: {
            "id": id,
            "_token": "{{ csrf_token() }}",
        },
            success: function (res) {

              $("#line-"+id).css("display", "none");
                $(".nbr-favorit").text(res.count_favorite_lines);
                if(res.count_favorite_lines == 0){
                    $("#p").css("display", "none");

                }
                else{
                    $("#b").text(res.count_favorite_lines);
                }

            }
		});
});
</script>
@endpush
