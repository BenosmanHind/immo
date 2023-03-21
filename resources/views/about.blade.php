@extends('layouts.front')
@section('content')
 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>A propos</h1>
                    <ul class="link">
                        <li><a href="{{ asset('/') }}">Accueil</a></li>
                        <li class="active">A propos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start About Section ======-->
<section class="about-area pt-80 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img-box mb-40">
                    <img src="{{ asset('front/assets/images/about/shape-1.png') }}" class="shape" alt="">
                    <div class="about-img about-big-img text-center">
                        <img src="{{ asset('front/assets/images/about-img1.png') }}" alt="">
                    </div>
                    <div class="about-img about-small-img">
                        <img src="{{ asset('front/assets/images/about-img-2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-box">
                    <div class="section-title">
                        <span class="span">A propo de nous</span>
                        <h2>Immo plus</h2>
                    </div>
                    <p>Bienvenue sur notre site de vente et location immobilière, dédié à vous aider à trouver votre prochain foyer. Nous sommes une entreprise passionnée par l'immobilier et nous sommes fiers de mettre notre expertise à votre disposition. Notre mission est de vous offrir une expérience transparente, professionnelle et personnalisée en matière d'achat, de vente et de location de biens immobiliers.<br>
                       Nous sommes déterminés à offrir à nos clients une expérience immobilière exceptionnelle en offrant des services de vente et de location personnalisés pour répondre à tous vos besoins immobiliers. Contactez-nous dès aujourd'hui pour planifier une visite ou pour discuter de vos besoins immobiliers spécifiques. Nous sommes impatients de travailler avec vous pour vous aider à trouver votre prochain foyer.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section><!--====== End About Section ======-->

@endsection
