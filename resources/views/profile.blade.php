@extends('layouts.front')
@section('content')


<section class="gallery-section pt-80 pb-50" id="gallery-filter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-nav text-center mb-50">
                    <ul class="filter-btn">
                        <li  class="active"><a href="{{ asset('/app') }}" >Mes annonces</a></li>
                        <li data-filter=".cat1">Mes messages</li>
                        <li data-filter=".cat2">Mes favoris</li>
                        <li data-filter=".cat2">Mon profil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Start contact-area ======-->
<section class="contact-area contact-area-v1 mb-4">
    <div class="container">
        <div class="row mt-4 d-flex justify-content-center">
           <div class="col-lg-8">
            @if($message)
            <div class="alert alert-success mt-4" role="alert">
                La modification a été bien enregistrer!
              </div>
            @endif
                <div class="form-wrapper">
                    <form class="login-wrapper-contents-form custom-form" method="POST" action="{{url('app/profile/'.Auth::user()->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                           @csrf
                        <div class="mb-4 text-center">
                            <p  > <span style="font-size: 22px; font-weight:500;color: #000"> Bienvenue,</span> <br>
                            <span style="font-size: 15px; font-weight:300;color: #000">Personnalisez votre profil selon vos envies et vos besoins !</span></p>
                        </div>
                        <div class="row d-flex justify-content-center">

                            <div class="col-lg-6">
                                <div class="form_group">
                                    <label>Nom:</label>
                                    <input type="text" class="form_control @error('fisrt_name') is-invalid @enderror"  name="first_name" value="{{Auth::user()->first_name}}" required autocomplete="first_name" >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <label>Prénom:</label>
                                    <input type="text" class="form_control " name="last_name" value="{{Auth::user()->last_name}}" required autocomplete="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <label>Téléphone:</label>
                                    <input type="text" class="form_control"  name="phone" value="{{Auth::user()->phone}}" required autocomplete="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <label>Email:</label>
                                    <input type="email" class="form_control" placeholder=" email" name="email" required autocomplete="email" value="{{Auth::user()->email}}" autofocus>
                               </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <label >Un nouveau mot de passe ? <p style="font-size: 15px; font-weight:450; margin-bottom : -2px;">(Laissez le champ vide si vous voulez garder l'ancien)</p></label>
                                    <input id="password" type="password" class="form_control " placeholder="********" name="password" >
                               </div>
                            </div>
                            <div class="col-lg-6 mt-2 text-center">
                                <div class="form_group">
                                    <button type ="submit" class="main-btn">Enregistrer</button>
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
@push('script-alert')
<script>
$(".alert").slideDown(200).delay(3500).slideUp(200);
</script>
@endpush
