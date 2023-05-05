@extends('layouts.front')
@section('content')

 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg);background-color: #696969">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>{{ $announcement->designation }}</h1>
                    <ul class="link">
                        <li><a href="index.html">Accueil</a></li>
                        <li class="active">{{ $announcement->designation }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start Shop-Details Section ======-->
<section class="shop-details-section light-bg pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="shop_big_slide">
                    <div class="single-img">
                        <a href="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" class="img-popup"><img src="{{ asset('storage/images/properties/'.$announcement->images[0]->link) }}" class="img-fluid" alt=""></a>
                    </div>
                    @foreach($announcement->images as $img)
                    @if($img->type == 2)
                    <div class="single-img">
                        <a href="{{ asset('/storage/images/properties/'.$img->link) }}" class="img-popup"><img src="{{ asset('storage/images/properties/'.$img->link) }}" class="img-fluid" alt=""></a>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="shop_thumb_slide">
                    @foreach($announcement->images as $img)
                    <div class="single-img">
                        <img src="{{ asset('/storage/images/properties/'.$img->link) }}" class="img-fluid" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <div class="details-content-box">
                    <h4><span class="badge badge-success">@if($announcement->type == 0 ) Vente @else Location @endif</span></h4>
                    <h3 class="title">{{ $announcement->designation }}</h3><h5>{{ $wilaya->name }} ,{{ $daira->name }} ,{{ $announcement->quartie }}</h5><p class="mt-2"><b>@if($announcement->superficie){{ $announcement->superficie }}</b> m²,@endif @if($announcement->etage)<b>{{ $announcement->etage }}</b> étage(s), @endif @if($announcement->piece)<b>{{ $announcement->piece }}</b> pièce(s)@endif</p>
                    <ul class="rating">
                        <div class="rating-result"></div>
                        <li class="price mt-3"><span>{{ number_format($announcement->price) }} Da</span></li>
                        <input type="hidden" id="rate-result" value="{{ $rating}}">
                    </ul>
                    <p>{{ $announcement->short_description }}</p>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 mt-3" >
                            <button class="main-btn favorit-btn">Ajouter au favoris</button>
                            <input type="hidden" value="{{ $announcement->id }}" id="id">
                        </div>
                    </div>
                    @if(Auth::user())
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-3" >
                                <button type="button" id="add-message" class="main-btn">Envoyer un message</button>
                                <input type="hidden" name="recipient" value="{{ $announcement->user_id }}" id="recipient">
                                <input type="hidden" name="name_1" value="{{ $announcement->id }}" id="announcement">
                        </div>

                    </div>
                    @endif
                    <ul class="social-link">
                        <li><span>Partager :</span></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Shop-Details Section ======-->
<!--====== Start Shop-Details Section ======-->
<section class="shop-details-section border-bottom pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="discription_area">
                    <div class="discription_tabs mb-30">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#additional">Informations de l'annonce</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link comment" data-toggle="tab" href="#reviews">Commentaire(s) ({{ $comment_count }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active">
                            <div class="content_box">
                                <p>{{ $announcement->description }}</p>

                            </div>
                        </div>
                        <div id="additional" class="tab-pane">
                            <div class="content_box">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                        <th scope="row">Numéro</th>
                                        <td>{{ $announcement->user->phone}}</td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Date</th>
                                        <td>{{ $announcement->created_at->format('Y-m-d h:m') }}</td>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Papier(s)</th>
                                        <td> @foreach($announcement->papers as $paper)<span class="badge badge-secondary">{{ $paper->designation }}</span>&nbsp; @endforeach</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Spécification(s)</th>
                                        <td> @foreach($announcement->specifications as $specification)<span class="badge badge-secondary">{{ $specification->designation }}</span>&nbsp; @endforeach</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Condition(s) de paiement</th>
                                        <td> @foreach($announcement->paymentConditions as $condition)<span class="badge badge-secondary">{{ $condition->designation }}</span>&nbsp; @endforeach</td>
                                      </tr>
                                    </tbody>
                                  </table>

                            </div>
                        </div>

                        <div id="reviews" class="tab-pane fade">
                            <div class="shop_review_area">
                                <h4 class="title title-comment">{{ $comment_count }} commentaire(s) pour {{ $announcement->designation }}</h4>
                                <div id="add-comment">
                                    @foreach($comments as $comment)
                                    <div class="review_user" >
                                        <img src="{{ asset('front/assets/images/shop/person-1.jpg') }}" alt="">
                                        <span><span>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span> – {{ $comment->created_at->format('Y-m-d H:m') }} | (<b>{{ $comment->raiting }}/5</b>)</span>
                                        <p>{{ $comment->comment }}.</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="review_form">
                                    @Auth
                                        @if($nbr_comment == 0)
                                        <div class="comment-section">
                                            <form >
                                                @csrf
                                                <div class="form_group">
                                                    <label>Commentaire*</label>
                                                    <textarea class="form_control" id="comment" placeholder="Votre commentaire *"></textarea>
                                                </div>
                                                <input type="hidden" id="announcement" value="{{ $announcement->id }}" >
                                                <div class="form_group">
                                                    <label>Votre note *</label>
                                                    <div class="my-rating"></div>
                                                </div>
                                                <div id="show_comment_msg" >

                                                </div>
                                                <div class="form_button">
                                                    <button type="button" class="main-btn add-comment">Envoyer</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <h6 >Vous avez déja donné un avis sur ce produit !</h6>
                                        @endif
                                    @else
                                    <h6 >Veuillez vous authentifier pour pouvoir poster un commentaire.</h6>
                                    <a href="{{asset('/login')}}"><button class="main-btn mt-4">Se connecter</button></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Shop-Details Section ======-->
  <!--====== Start contact_map section ======-->
  <section class="contact-map-section">
    <div class="map_box">
        <img src="{{ asset('front/assets/images/marker.png') }}" alt="">
        <iframe src="{{ $announcement->lien_map }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    </div>
</section><!--====== End contact_map section ======-->
 <!--====== Start Shop Section ======-->
 @if($other_announcements)
<section class="shop-grid-v2 pt-70 pb-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-45">
                    <h2>Autres annonces aux {{ $wilaya->name }}</h2>
                    <p>Découvrez nos autres annonces disponibles sur immo+ !</p>
                </div>
            </div>
        </div>
        <div class="row best-slide">
            @foreach($other_announcements as $other_announcement)
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">@if($other_announcement->type == 0) Vente @else Location @endif</span>
                        <img src="{{ asset('/storage/images/properties/'.$other_announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <div class="rating-result-1"></div>
                        </ul>
                        <input type="hidden" id="rate-result-1" value="{{ $other_announcement->avgRaiting()}}">
                        <h3 class="title"><a href="{{ url('announcement/'.$other_announcement->slug) }}">{{ $other_announcement->designation }}</a></h3>
                        <p class="price">{{ number_format($other_announcement->price) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">@if($other_announcement->type == 0) Vente @else Location @endif</span>
                        <img src="{{ asset('/storage/images/properties/'.$other_announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <div class="rating-result-2"></div>
                        </ul>
                        <input type="hidden" id="rate-result-2" value="{{ $other_announcement->avgRaiting()}}">
                        <h3 class="title"><a href="{{ url('announcement/'.$other_announcement->slug) }}">{{ $other_announcement->designation }}</a></h3>
                        <p class="price">{{ number_format($other_announcement->price) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">@if($other_announcement->type == 0) Vente @else Location @endif</span>
                        <img src="{{ asset('/storage/images/properties/'.$other_announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <div class="rating-result-3"></div>
                        </ul>
                        <input type="hidden" id="rate-result-3" value="{{ $other_announcement->avgRaiting()}}">
                        <h3 class="title"><a href="{{ url('announcement/'.$other_announcement->slug) }}">{{ $other_announcement->designation }}</a></h3>
                        <p class="price">{{ number_format($other_announcement->price) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">@if($other_announcement->type == 0) Vente @else Location @endif</span>
                        <img src="{{ asset('/storage/images/properties/'.$other_announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <div class="rating-result-4"></div>
                        </ul>
                        <input type="hidden" id="rate-result-4" value="{{ $other_announcement->avgRaiting()}}">
                        <h3 class="title"><a href="{{ url('announcement/'.$other_announcement->slug) }}">{{ $other_announcement->designation }}</a></h3>
                        <p class="price">{{ number_format($other_announcement->price) }} Da</p>
                    </div>
                </div>
            </div>
            </div>

            @endforeach
        </div>
    </div>
</section><!--====== End Shop Section ======-->
@endif
<!--====== Start sponsor-area section ======-->
<section class="sponsor-area red-bg pt-60 pb-60">
    <div class="container">
        <div class="row sponsor-slide">
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-1.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-2.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-3.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-4.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-5.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-6.png" class="img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2 sponsor-item">
                <a href="#"><img src="assets/images/sponsor/client-3.png" class="img-fluid" alt=""></a>
            </div>
        </div>
    </div>
</section><!--====== End sponsor-area section ======-->
<div id="show-modal-message">
</div>
@endsection
@push('comment-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".add-comment").on("click", function (e)
    {
        $('#show_comment_msg').html('<div >En cours....</div>');
        var comment = $('#comment').val();
        var announcement = $('#announcement').val();
        var rating = $('.my-rating').starRating('getRating');

        var data = {
            "_token": "{{ csrf_token() }}",
            comment: comment,
            announcement: announcement,
            rating: rating
        };

        $.ajax(
                {
                    url: "/comment",
                    type: "POST",
                    data: data,
                    success: function (res) {
                     var path ='{{ asset("front/assets/images/shop/person-1.jpg") }}';
                        $('#add-comment').append('<div class="review_user" >'+' <img src="'+path+'" alt="">'+' <span><span>'+res.name+'</span> – '+res.date+ ' | (<b>'+res.rating+'/5</b>)'+'</span>'+'<p>'+res.comment+'</p>'+'</div>');
                        toastr.success('Message envoyé avec success');
                        $(".comment-section").hide();
                        $("h4.title-comment").text(''+res.comment_count+' commentaire(s) pour '+res.designation);
                        $(".comment").text('Commentaire(s) '+res.comment_count );

                    }
                });
        e.preventDefault();
    });

</script>

<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(".favorit-btn").on("click", function (e)
  {
      var id = $('#id').val();
      var data = {
          "_token": "{{ csrf_token() }}",
          id: id,
      };

      $.ajax(
              {
                  url: "/favorit",
                  type: "POST",
                  data: data,
                  success: function (res) {
                    if(res.qtes == 0){
                     toastr.success('Produit ajouté avec success');
                     $(".nbr-favorit").text(res.nbr_favorit);
                    }
                    else{
                        toastr.error('Produit existe déja dans votre favoris');
                    }

                  }
              });
      e.preventDefault();
  });

</script>
@endpush
@push('modal-message-script')
<script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#add-message").click(function() {
   var announcement = $('#announcement').val();
   var recipient = $('#recipient').val();
   var AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
   if(AuthUser == ''){
    alert('Créez un compte ou connectez-vous à Immo+ pour faire cette action.')
   }
   $.ajax({
      url: '/show-model-message/'+announcement+'/'+recipient ,
      type: "GET",
      success: function (res) {
        $('#show-modal-message').html(res);
        $("#modal-message").modal('show');
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

    $("#show-modal-message").on('click','#store-message',function(e){

          e.preventDefault();
          let announcement = $('#announcement').val();
          let recipient = $('#recipient').val();
          let sender = $('#sender').val();
          let message = $('#message').val();
          $.ajax({
            type:"Post",
            url: '/messages',
            data:{
              "_token": "{{ csrf_token() }}",
              announcement:announcement,
              recipient:recipient,
              sender:sender,
              message:message
            },
            success:function(response){
              $('#modal-message').modal('hide');
              toastr.success('Message envoyé avec success');

            },

            });

     });
  </script>
@endpush
