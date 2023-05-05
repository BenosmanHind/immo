@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Profil</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier votre profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if($message)
                            <div class="alert alert-success mt-4" role="alert">
                                La modification a été bien enregistrer!
                              </div>
                            @endif
                            <form class="login-wrapper-contents-form custom-form" method="POST" action="{{url('admin/profil/'.Auth::user()->id)}}">
                                <input type="hidden" name="_method" value="PUT">
                                   @csrf
                                <div class="form-group">
                                    <label>Nom* :</label>
                                    <input type="text" class="form-control input-default " name="first_name" value="{{ Auth::user()->first_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Prénom* :</label>
                                    <input type="text" class="form-control input-default " name="last_name" value="{{ Auth::user()->last_name }}"  required>
                                </div>
                                <div class="form-group">
                                    <label>Téléphone* :</label>
                                    <input type="text" class="form-control input-default " name="phone" value="{{ Auth::user()->phone }}"  required>
                                </div>
                                <div class="form-group">
                                    <label>Email* :</label>
                                    <input type="text" class="form-control input-default " name="email" value="{{ Auth::user()->email }}"  required>
                                </div>
                                <div class="form-group">
                                    <label >Un nouveau mot de passe ? <p style="font-size: 15px; font-weight:450; margin-bottom : -2px;">(Laissez le champ vide si vous voulez garder l'ancien)</p></label>
                                    <input type="password" class="form-control input-default " name="password" placeholder="********" >
                                </div>
                                <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
