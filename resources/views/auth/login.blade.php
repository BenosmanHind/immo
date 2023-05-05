@extends('layouts.front')
@section('content')

 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg); background-color: #696969">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>Connexion</h1>
                    <ul class="link">
                        <li><a href="#">Accueil</a></li>
                        <li class="active">Connexion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start contact-area ======-->
<section class="contact-area contact-area-v1 mb-4">
    <div class="container">
        <div class="row mt-4 d-flex justify-content-center">
           <div class="col-lg-8">
                <div class="form-wrapper" style="background: #eaeaea;">


                    <form class="contact-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">

                            <div class="mb-4 text-center">
                                <p  > <span style="font-size: 22px; font-weight:500;color: #000"> Bienvenue,</span> <br>
                                <span style="font-size: 15px; font-weight:300;color: #000"> Merci de fournir les informations de connexion </span></p>
                            </div>
                            <div class="col-lg-9">
                                <div class="form_group">
                                    <input type="email" class="form_control @error('email') is-invalid @enderror" placeholder="Votre email" name="email" required autocomplete="email" autofocus>
                                    <i class="fal fa-envelope"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form_group">
                                    <input type="password" class="form_control @error('password') is-invalid @enderror" placeholder="Votre mot de passe" name="password" required autocomplete="current-password">
                                    <i class="fal fa-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if($error)
                            <div class="col-lg-9">
                                <div class="alert alert-danger mt-3" role="alert">
                                    <span style="font-size: 15px;">  {{$error}}  </span>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 mt-2 text-center">
                                <div class="form_group">
                                    <button type ="submit" class="main-btn">Se connecter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End contact-area ======-->

@endsection
