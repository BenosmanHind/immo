@extends('layouts.front')
@section('content')
       <!--====== Start breadcrumbs-section ======-->
       <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg);background-color: #696969">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumbs-content text-center">
                        <h1>Recherche</h1>
                        <ul class="link">
                            <li><a href="{{ asset('/') }}">Accueil</a></li>
                            <li class="active">Recherche</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End breadcrumbs-section ======-->
<!--====== Start Shop-grid section ======-->
<section class="shop-grid-v2 shop-grid-sidebar pt-80 pb-80 light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-widget-area products-sidebar">
                    <div class="widget widget_categories mb-30">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li class="cat-item"><a href="{{ asset('category/'.$category->id) }}">{{ $category->designation }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if($count_announcement == 0)
                <div class="container mt-4 ">
                    <div class="alert alert-danger alert-dismissible fade show flash-alert"  role="alert">
                    <button type = "button" class = "btn-close" style="color:#fff ;" data-bs-dismiss = "alert" id = "close"> </button>
                    <strong>Désolé , il n'y a pas d'annonces disponibles pour le moment correspondant à vos critères de recherche.</strong>
                    </div>
                </div>
                @else
                <p >Nous avons trouvé <b>{{ $count_announcement }}</b> annonce(s) immobilière(s) correspondant à votre recherche.</p>
                @endif
                <div class="row mt-3">
                 @foreach($announcements as $announcement)
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                                <ul class="rating">
                                    <li class="star"><i class="fas fa-star"></i></li>
                                    <li class="star"><i class="fas fa-star"></i></li>
                                    <li class="star"><i class="fas fa-star"></i></li>
                                    <li class="star"><i class="fas fa-star"></i></li>
                                    <li class="star"><i class="fas fa-star"></i></li>
                                </ul>
                                <h3 class="title"><a href="{{ asset('announcement/'.$announcement->slug) }}">{{ $announcement->designation }}</a></h3>
                                <p class="price">{{ $announcement->price }} Da</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Shop-grid section ======-->

@endsection
