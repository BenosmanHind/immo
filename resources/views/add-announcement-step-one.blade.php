@extends('layouts.front')
@section('content')

 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg); background-color: #696969">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>Ajouter annonce</h1>
                    <ul class="link">
                        <li><a href="#">Accueil</a></li>
                        <li class="active">Ajouter annonce</li>
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
                   <div class="row d-flex justify-content-center">
                            <div class="mb-4 text-center">
                                <p  > <span style="font-size: 22px; font-weight:500;color: #000"> Bienvenue,</span> <br>
                                <span style="font-size: 15px; font-weight:300;color: #000"> Veuillez sélectionner une catégorie correspondant à votre annonce et le type de l'annonce !</span></p>
                            </div>
                    </div>

                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-6">
                            <div class="form-group">

                                <select class="form-control selectpicker" data-live-search="true" id="category">
                                    <option value=""  selected>Catégorie: </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" >{{ $category->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control selectpicker"  data-live-search="true" id="type">
                                    <option value=""  selected>Annonce pour ? : </option>
                                    <option value="0" >Vente </option>
                                    <option value="1" >Location</option>
                                </select>
                            </div>
                        </div>
                       <div class="col-lg-6 mt-4 text-center">
                            <div class="form_group">
                                <button id="btn-go" class="main-btn">Suivant</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End contact-area ======-->

@endsection
@push('go-step-two-scripts')
<script>
    $( "#btn-go" ).click(function() {
                var category = $( "#category" ).val();
                var type = $( "#type" ).val();
                window.location.replace('/app/announcement-step-two/'+ category +'/'+type);
            });
</script>
@endpush
