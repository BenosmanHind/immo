@extends('layouts.front')
@section('content')
<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li data-filter="*" class="active">Mes annonces</li>
                        <li data-filter=".cat1">Bearing</li>
                        <li data-filter=".cat2">Wheel</li>
                        <li data-filter=".cat3">Cars</li>
                        <li data-filter=".cat4">Messagerie</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
 <!--====== Start Shop-List section ======-->
 <section class="shop-list-section shop-list-sidebar shop-grid-sidebar pt-80 pb-80 light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-item mb-15" style="height: 7%">
                            <div class="shop-img">
                                <span class="span new">new</span>
                                <img src="{{ asset('front/assets/images/shop/products-14.jpg') }}" alt="">
                                <div class="shop-overlay">
                                    <div class="overlay-content">
                                        <ul>
                                            <li><a href="#" class="icon"><i class="far fa-cart-plus"></i></a></li>
                                            <li><a href="assets/images/shop/products-14.jpg" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
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
                                <h3 class="title"><a href="shop-details.html">DOE Replica Wheels</a></h3>
                                <p class="price">$95.99</p>

                            </div>
                        </div>
                        <div class="shop-item mb-15" style="height: 7%">
                            <div class="shop-img">
                                <span class="span new">new</span>
                                <img src="{{ asset('front/assets/images/shop/products-15.jpg') }}" alt="">
                                <div class="shop-overlay">
                                    <div class="overlay-content">
                                        <ul>
                                            <li><a href="#" class="icon"><i class="far fa-cart-plus"></i></a></li>
                                            <li><a href="assets/images/shop/products-15.jpg" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
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
                                <h3 class="title"><a href="shop-details.html">A/C & Heater Control</a></h3>
                                <p class="price">$95.99</p>

                            </div>
                        </div>
                        <div class="shop-item mb-15" style="height:7%" >
                            <div class="shop-img">
                                <span class="span new">new</span>
                                <img src="{{ asset('front/assets/images/shop/products-16.jpg') }}" alt="">
                                <div class="shop-overlay">
                                    <div class="overlay-content">
                                        <ul>
                                            <li><a href="#" class="icon"><i class="far fa-cart-plus"></i></a></li>
                                            <li><a href="{{ asset('front/') }}assets/images/shop/products-16.jpg" class="icon img-popup"><i class="far fa-search-plus"></i></a></li>
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
                                <h3 class="title"><a href="shop-details.html">DOE Replica Wheels</a></h3>
                                <p class="price">$95.99</p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!--====== End Shop-List section ======-->


@endsection

