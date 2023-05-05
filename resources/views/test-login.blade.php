@extends('layouts.front')
@section('content')

 <div class="container" style="margin-top:100px; margin-bottom:100px;" >
    <div class="row mt-4 d-flex justify-content-center">
        @if(Auth::user()->status == 0)
        <div class="alert alert-warning" role="alert">
            Votre compte n'a pas encore été validé , veuillez attendre l'accéptation de votre compte svp ! <br>Nous vous informerons par e-mail dès que votre compte sera approuvé.
        </div>
        @elseif(Auth::user()->status == 2)
        <div class="alert alert-danger" role="alert">
            Votre compte a été désactiver!
        </div>
        @endif
    </div>
 </div>

@endsection
