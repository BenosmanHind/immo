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
                        <li class="star"><i class="fas fa-star"></i></li>
                        <li class="star"><i class="fas fa-star"></i></li>
                        <li class="star"><i class="fas fa-star"></i></li>
                        <li class="star"><i class="fas fa-star"></i></li>
                        <li class="star"><i class="fas fa-star"></i></li>
                        <li class="price"><span>{{ number_format($announcement->price) }} Da</span></li>

                    </ul>
                    <p>{{ $announcement->short_description }}</p>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 mt-3" >
                            <button class="main-btn">Ajouter au favoris</button>
                        </div>
                    </div>
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
                              <a class="nav-link" data-toggle="tab" href="#reviews">Commentaire(s) (1)</a>
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
                                <h4 class="title">1 commentaire pour {{ $announcement->designation }}</h4>
                                <div class="review_user">
                                    <img src="{{ asset('front/assets/images/shop/person-1.jpg') }}" alt="">
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span><span>admin</span> – December 24, 2020</span>
                                    <p>Cet appartement à vendre est absolument magnifique ! De belles finitions, une vue imprenable et une localisation idéale font de cette propriété une opportunité exceptionnelle pour toute personne à la recherche d'un lieu de vie de qualité.</p>
                                </div>
                                <div class="review_form">
                                    <form>
                                        <div class="form_group">
                                            <label>Nom complet *</label>
                                            <input type="text" class="form_control" placeholder="Nom complet *">
                                        </div>
                                        <div class="form_group">
                                            <label>Email *</label>
                                            <input type="email" class="form_control" placeholder="Email *">
                                        </div>
                                        <div class="form_group">
                                            <label>Commentaire*</label>
                                            <textarea class="form_control" name="#" placeholder="Votre commentaire *"></textarea>
                                        </div>
                                        <div class="form_group">
                                            <label>Votre note *</label>
                                            <ul class="rating">
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="form_button">
                                            <button type="submit" class="main-btn">Envoyer</button>
                                        </div>
                                    </form>
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
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
</section><!--====== End contact_map section ======-->
 <!--====== Start Shop Section ======-->
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
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">new</span>
                        <img src="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="shop-details.html">KLEINGOEFT (67440)</a></h3>
                        <p class="price">{{ number_format(350000.0) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">new</span>
                        <img src="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="shop-details.html">KLEINGOEFT (67440)</a></h3>
                        <p class="price">{{ number_format(350000.0) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">new</span>
                        <img src="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="shop-details.html">KLEINGOEFT (67440)</a></h3>
                        <p class="price">{{ number_format(350000.0) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">new</span>
                        <img src="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="shop-details.html">KLEINGOEFT (67440)</a></h3>
                        <p class="price">{{ number_format(350000.0) }} Da</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-item mb-20">
                    <div class="shop-img">
                        <span class="span new">new</span>
                        <img src="{{ asset('/storage/images/properties/'.$announcement->images[0]->link) }}" alt="">
                    </div>
                    <div class="shop-content text-center">
                        <ul class="rating">
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                            <li class="star"><i class="fas fa-star"></i></li>
                        </ul>
                        <h3 class="title"><a href="shop-details.html">KLEINGOEFT (67440)</a></h3>
                        <p class="price">{{ number_format(350000.0) }} Da</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Shop Section ======-->
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

@endsection
