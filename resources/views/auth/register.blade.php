@extends('layouts.front')
@section('content')

 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg);background-color: #696969">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>Inscription</h1>
                    <ul class="link">
                        <li><a href="index.html">Accueil</a></li>
                        <li class="active">Inscription</li>
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
                <div class="form-wrapper">
                    <form class="contact-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 text-center">
                            <p  > <span style="font-size: 22px; font-weight:500;color: #000"> Bienvenue,</span> <br>
                            <span style="font-size: 15px; font-weight:300;color: #000"> Merci de remplir tous les champs</span></p>
                        </div>
                        <div class="row d-flex justify-content-center">

                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control @error('fisrt_name') is-invalid @enderror" placeholder="nom" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" >
                                    <i class="fal fa-pencil"></i>
                                    @error('fisrt_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control @error('last_name') is-invalid @enderror" placeholder="prénom" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                    <i class="fal fa-pencil"></i>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control @error('phone') is-invalid @enderror" placeholder=" numéro de téléphone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    <i class="fal fa-phone"></i>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="email" class="form_control @error('email') is-invalid @enderror" placeholder=" email" name="email" required autocomplete="email" value="{{ old('email') }}" autofocus>
                                    <i class="fal fa-envelope"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input id="password" type="password" class="form_control @error('password') is-invalid @enderror" placeholder=" mot de passe" name="password" required autocomplete="new-password">
                                    <i class="fal fa-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input id="password-confirm" type="password" class="form_control" placeholder="confirmer le mot de passe" name="password_confirmation" required autocomplete="new-password">
                                    <i class="fal fa-lock"></i>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2 text-center">
                                <div class="form_group">
                                    <button type ="submit" class="main-btn">S'inscrir</button>
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
