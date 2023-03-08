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
                    <form class="contact-form" method="POST" action="{{ url('/app/announcement') }}" enctype='multipart/form-data'>
                        @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="mb-4 text-center">
                                    <p> <span style="font-size: 22px; font-weight:500;color: #000"> 2ème étape ,</span> <br>
                                    <span style="font-size: 15px; font-weight:300;color: #000"> Merci de remplire tous les champs</span></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="designation *" name="designation" required >
                                    </div>
                                </div>
                            </div>

                            @if($category == 1 || $category == 4 || $category == 7 || $category == 8 )
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('etage') is-invalid @enderror" placeholder="etage *" name="etage" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *" name="piece" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 3 || $category == 11)
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *" name="superficie" required >
                                                <div class="input-group-append">
                                                    <span class="input-group-text">m²</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" required >
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($category == 5)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('etage') is-invalid @enderror" placeholder="etage *" name="etage" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *" name="piece" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 10)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *" name="piece" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 12)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="conditions[]" data-live-search="true">
                                                <option value="" disabled selected>Conditionds de paiement : </option>
                                                <option value="Promesse de vente possible">Promesse de vente possible</option>
                                                <option value="Paiement par tranche possible">Paiement par tranche possible</option>
                                                <option value="Crédit bancair possible">Crédit bancair possible</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="specifications[]" data-live-search="true">
                                                <option value="" disabled selected>Spécifications : </option>
                                                <option value="Jardin">Jardin</option>
                                                <option value="Eléctricité">Eléctricité</option>
                                                <option value="Gaz">Gaz</option>
                                                <option value="Gaz">Eau</option>
                                                <option value="Meublé">Meublé</option>
                                                <option value="Garage">Garage</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="papers[]" data-live-search="true">
                                                <option value="" disabled selected>Papiers : </option>
                                                <option value="Promotion immobilière">Promotion immobilière</option>
                                                <option value="Acte notarié">Acte notarié</option>
                                                <option value="Acte dans l'indivision">Acte dans l'indivision</option>
                                                <option value="Papier timbr">Papier timbré</option>
                                                <option value="Décision">Décision</option>
                                                <option value="Livret fancié">Livret fancié</option>
                                                <option value="Permis de construir">Permis de construir</option>
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select  class="form-control selectpicker" name="wilaya" id="select-wilaya" data-live-search="true" required>
                                                <option value="" disabled selected>Wilaya : </option>
                                                @foreach($wilayas as $wilaya)
                                                <option value="{{ $wilaya->id }}">{{ $wilaya->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select  class="form-control selectpicker" name="daira" id="select-daira" data-live-search="true" required>
                                                <option value="" disabled selected>Daira : </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Quartier *" name="quartier" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Lien map *" name="map " >

                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description courte" name="short_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <label>Photo principale * :</label>
                                        <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="image"  name="photoprincipale" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Les photos secondaires* :</label>
                                        <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="image" multiple  name="photos[]" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $category }}" name="category">
                                <input type ="hidden" value="{{ $type }}" name="type">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 mt-2 text-center">
                                        <div class="form_group">
                                            <button type ="submit" class="main-btn">Ajouter</button>
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
@push('select-wilaya-script')
<script>
    	$("#select-wilaya").change(function() {

       var id = $(this).val();
       var data="";
       $.ajax({
           url: '/get-dairas/' + id,
           type: "GET",

           success: function (res) {
               $.each(res, function(i, res) {
                data = data + '<option value="'+ res.id+ '" >'+ res.name+ '</option>';

               });
               $('#select-daira').html(data);
               $('#select-daira').selectpicker('refresh');
			   $('#select-daira').selectpicker('refresh');
           }
       });


   });
</script>
@endpush
