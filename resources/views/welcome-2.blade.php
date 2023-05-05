@extends('layouts.front')
@section('content')
<!--====== Start Hero Section ======-->
<section class="hero-area-v2">
    <div class="hero-slide-two">
        <div class="single-hero bg_cover" style="background-image: url(front/assets/images/bg/breadcrumbs-bg.jpg); background-color: #696969">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="hero-content text-center">
                            <h2 style="color:#fff; font-size:35px; margin-buttom:10px;" >Trouvez la maison de <br> <span style="color: #ecb500;font-size:50px;"> vos rêves en Algérie </span><br> avec notre site immobilier...</h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-filter mt-3">
                <form action="/search" method="GET" role="search">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-control selectpicker"  data-live-search="true" name="type" >
                                    <option data-display="Cars Name">Type</option>
                                    <option value="0">Vente</option>
                                    <option value="1">Location</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select  class="form-control selectpicker"  data-live-search="true" name="category">
                                    <option data-display="Cars Name">Catégorie</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->designation }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select  class="form-control selectpicker"  data-live-search="true" name="wilaya">
                                    <option data-display="Select Year">Wilaya</option>
                                    @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->id }}">{{ $wilaya->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <button class="main-btn">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hero-social text-center">
                <ul class="social-link">
                    <li><span>Follow Us</span></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>


    </div>
</section><!--====== Emd Hero Section ======-->
<!--====== Start Shop Section ======-->
<section class="shop-list-section pt-80 pb-50 light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title mb-40 text-center">
                    <h2>Catégories populaires</h2>
                    <p>Découvrez notre sélection de catégories pour trouver facilement ce que vous cherchez sur notre site !</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shop-item mb-30">
                    <div class="shop-img">
                        <img src="{{ asset('front/assets/images/appartement.png') }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                    <li><a href="{{ asset('front/assets/images/appartement.png') }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="{{ asset('category/1') }}">Appartement</a></h3>
                        <p>Explorez notre catégorie d'appartements pour trouver votre prochain chez-vous, que ce soit pour une location ou un achat.</p>
                        <a href="{{ asset('category/1') }}" class="main-btn">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-item mb-30">
                    <div class="shop-img">
                        <img src="{{ asset('front/assets/images/terrain.png') }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                    <li><a href="{{ asset('front/assets/images/terrain.png') }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="{{ asset('category/3') }}">Terrain</a></h3>
                        <p>Découvrez notre catégorie de terrains pour concrétiser votre projet de construction et trouver l'emplacement idéal pour votre future maison.</p>
                        <a href="{{ asset('category/3') }}" class="main-btn">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-item mb-30">
                    <div class="shop-img">
                        <img src="{{ asset('front/assets/images/villa.png') }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                  <li><a href="{{ asset('front/assets/images/villa.png') }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="{{ asset('category/4') }}">Villa</a></h3>
                        <p>Découvrez notre catégorie de villas pour vivre une expérience luxueuse et profiter d'un cadre exceptionnel lors de vos vacances ou de votre résidence principale.</p>
                        <a href="{{ asset('category/4') }}" class="main-btn">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shop-item mb-30">
                    <div class="shop-img">
                        <img src="{{ asset('front/assets/images/immeuble.png') }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                    <li><a href="{{ asset('front/assets/images/immeuble.png') }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="{{ asset('category/9') }}">Immeuble</a></h3>
                        <p>Explorez notre catégorie d'immeubles pour investir dans des biens immobiliers rentables et diversifier votre portefeuille immobilier.</p>
                        <a href="{{ asset('category/9') }}" class="main-btn">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Shop Section ======-->
<!--====== Start Company Section ======-->
<section class="company-section bg_cover pt-60 pb-55" style="background-image: url('/front/assets/images/bg/company-bg.jpg');">
<div class="container">
    <div class="row justify-content-center">
       <h4 style="color:#fff">Simplifiez votre recherche de biens immobiliers avec nous et réalisez votre rêve. </h4>
    </div>

</div>
</section><!--====== End Company Section ======-->

<!--====== Start Shop Section ======-->
<section class="shop-grid-v2 pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="products-tab mb-50">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#vente">Dernières annonces </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="vente" class="tab-pane active">
                <div class="row">
                    @foreach($announcements as $announcement)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="shop-item mb-20">
                            <div class="shop-img">
                                <span class="span new">@if($announcement->type == 0) Vente @else Location @endif</span>
                                <img src="{{ asset('storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                                <div class="shop-overlay">
                                    <div class="overlay-content">
                                        <ul>
                                           <li><a href="{{ asset('storage/images/properties/'.$announcement->images[0]->link) }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-content text-center">
                                <h3 class="title"><a href="{{ asset('announcement/'.$announcement->slug) }}">{{ $announcement->designation }}</a></h3>
                                <p class="price">{{ $announcement->price }} Da</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
            </div>
        </div>

</section><!--====== End Shop Section ======-->
<!--====== Start Newsletter Section ======-->
<div class="toast">
    <div class="toast-header">
      Toast Header
    </div>
    <div class="toast-body">
      Some text inside the toast body
    </div>
  </div>
<section class="newsletter-section bg_cover pt-75 pb-80" style="background-image: url(assets/images/bg/newsletter-bg.jpg);background-color: #696969">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="newsletter-content text-center">
                    <span class="span">abonnez-vous à la newsletter</span>
                       <div class="form_group">
                            <input type="email" class="form_control" placeholder="Enter Your Email Address" id="email" required>
                            <button class="main-btn btn-newsletter">Abonnez-vous maintenant</button>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</section><!--====== End Newsletter Section ======-->
<!--====== Start Shop Section ======-->
<section class="shop-grid-v2 pt-70 pb-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-45">
                    <h2>À vendre</h2>
                    <p>Explorez notre sélection d'annonces de vente et trouvez la propriété de vos rêves.</p>
                </div>
            </div>
        </div>
        <div class="row best-slide">
            @foreach($announcements_vente as $announcement_vente)
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                       <img src="{{ asset('storage/images/properties/'.$announcement_vente->images[0]->link) }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                 <li><a href="{{ asset('storage/images/properties/'.$announcement_vente->images[0]->link) }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content text-center">

                        <h3 class="title"><a href="{{ asset('announcement/'.$announcement_vente->slug) }}">{{ $announcement_vente->designation }}</a></h3>
                        <p class="price">{{ $announcement_vente->price }} Da</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!--====== End Shop Section ======-->

<!--====== Start Shop Section ======-->
<section class="shop-grid-v2 pt-70 pb-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-45">
                    <h2>Location</h2>
                    <p>Découvrez notre sélection d'annonces de location pour trouver votre nouveau chez-vous.</p>
                </div>
            </div>
        </div>
        <div class="row best-slide">
            @foreach($announcements_location as $announcement_location)
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                       <img src="{{ asset('storage/images/properties/'.$announcement_location->images[0]->link) }}" alt="">
                        <div class="shop-overlay">
                            <div class="overlay-content">
                                <ul>
                                 <li><a href="{{ asset('storage/images/properties/'.$announcement_location->images[0]->link) }}" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="shop-content text-center">

                        <h3 class="title"><a href="{{ asset('announcement/'.$announcement_location->slug) }}">{{ $announcement_location->designation }}</a></h3>
                        <p class="price">{{ $announcement_location->price }} Da</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!--====== End Shop Section ======-->

<!--====== Start Testimonial Section ======-->
<section class="testimonial-area-v2 light-bg pt-70 pb-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-50">
                    <h2>Avis des clients</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row testimonial-slide-two">
            <div class="col-lg-4">
                <div class="testimonial-item mb-40">
                    <div class="testimonial-thumb-title">
                        <div class="thumb">
                            <img src="{{ asset('front/assets/images/about/thumb-1.jpg') }}" alt="">
                        </div>
                        <div class="title">
                            <h5>Atik romaissa</h5>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>J'ai utilisé ce site pour trouver une propriété à louer et j'ai été extrêmement satisfait du service que j'ai reçu. Les annonces étaient détaillées et précises, ce qui m'a permis de trouver rapidement des biens immobiliers correspondant à mes critères. Le processus de location a été fluide et efficace grâce à l'équipe compétente et professionnelle en charge de mon dossier. Je recommande fortement ce site pour toute personne à la recherche d'un bien immobilier de qualité et d'un service client irréprochable.</p>

                        <i class="far fa-quote-right quote-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mb-40">
                    <div class="testimonial-thumb-title">
                        <div class="thumb">
                            <img src="{{ asset('front/assets/images/about/thumb-2.jpg') }}" alt="">
                        </div>
                        <div class="title">
                            <h5>Abdellah Ahmed</h5>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>J'ai récemment acheté ma maison grâce à ce site et je ne pourrais être plus heureux de mon expérience. Les annonces étaient bien présentées avec de superbes photos qui ont donné une idée claire des propriétés avant même d'organiser une visite.Je recommande vivement ce site pour ceux qui cherchent à acheter une propriété en toute confiance et en toute simplicité.</p>

                        <i class="far fa-quote-right quote-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mb-40">
                    <div class="testimonial-thumb-title">
                        <div class="thumb">
                            <img src="{{ asset('front/assets/images/about/thumb-2.jpg') }}" alt="">
                        </div>
                        <div class="title">
                            <h5>Benyelles fatéma</h5>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>Je cherchais à louer un appartement dans un quartier spécifique et j'ai trouvé exactement ce que je cherchais grâce à ce site. Les annonces étaient nombreuses et variées, avec des détails précis sur chaque propriété, ce qui m'a permis de trouver rapidement des options qui correspondaient à mes critères. Le personnel a été très utile pour répondre à toutes mes questions. Je recommande fortement ce site pour toute personne à la recherche d'un bien immobilier de qualité et d'un excellent service client.</p>

                        <i class="far fa-quote-right quote-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Testimonial Section ======-->
@endsection
@push('add-newsletter')
<script>
$( ".btn-newsletter" ).click(function(e) {

    e.preventDefault();
    let email = $('#email').val();
    $.ajax({
          type:"Post",
          url: '/newsletter',
          data:{
            "_token": "{{ csrf_token() }}",
            email:email,
          },
          success:function(response){

            if(response == true){
                toastr.success("Vous allez reçevoir toutes nos nouveautés", "Inscription réussite", {
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
            }
            else{
                toastr.error("Ce email existe déja", "Erreur", {
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
            }
          },

          });
});
$( ".btn-close" ).click(function(e) {
    $("#liveToast").hide();

});
$( ".close2" ).click(function(e) {
    $("#liveToast2").hide();

});
</script>
@endpush
