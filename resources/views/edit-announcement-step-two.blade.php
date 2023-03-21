@extends('layouts.front')
@section('content')

 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg); background-color: #696969">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>{{ $announcement->designation }}</h1>
                    <ul class="link">
                        <li><a href="#">Accueil</a></li>
                        <li class="active">Modifier annonce</li>
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
                    <form class="contact-form" method="POST" action="{{ url('/app/announcement/'.$announcement->id) }}" enctype='multipart/form-data'>
                        <input type="hidden" name="_method" value="PUT">
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
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="designation *" value="{{ $announcement->designation }}" name="designation" required >
                                    </div>
                                </div>
                            </div>

                            @if($category == 1 || $category == 4 || $category == 7 || $category == 8 )
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *" value="{{ $announcement->superficie }}" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('etage') is-invalid @enderror" placeholder="etage *"value="{{ $announcement->etage }}" name="etage" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *"value="{{ $announcement->piece }}" name="piece" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" name="price" value="{{ $announcement->price }}" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 3 || $category == 11)
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *"value="{{ $announcement->superficie }}" name="superficie" required >
                                                <div class="input-group-append">
                                                    <span class="input-group-text">m²</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $announcement->price }}" placeholder="prix *" name="price" required >
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($category == 5)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('etage') is-invalid @enderror" placeholder="etage *"value="{{ $announcement->etage }}" name="etage" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *"value="{{ $announcement->piece }}" name="piece" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *" value="{{ $announcement->price }}" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 10)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" placeholder="superficie *"value="{{ $announcement->superficie }}" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('piece') is-invalid @enderror" placeholder="Pièces *"value="{{ $announcement->piece }}" name="piece" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="prix *"value="{{ $announcement->price }}" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category == 12)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('superficie') is-invalid @enderror" value="{{ $announcement->superficie }}" placeholder="superficie *" name="superficie" required >
                                            <div class="input-group-append">
                                                <span class="input-group-text">m²</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror"value="{{ $announcement->price }}" placeholder="prix *" name="price" required >
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="conditions[]" data-live-search="true">
                                                <option value="" disabled selected>Conditionds de paiement : </option>
                                                @foreach($conditions as $condition)
                                                <option value="{{ $condition->designation }}" selected>{{ $condition->designation }}</option>
                                                @endforeach
                                                @foreach($resultats_c as $resultat_c)
                                                <option value="{{ $resultat_c }}">{{ $resultat_c }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="specifications[]" data-live-search="true">
                                                <option value="" disabled selected>Spécifications : </option>
                                                @foreach($specifications as $specification)
                                                <option value="{{ $specification->designation }}"selected>{{ $specification->designation }}</option>
                                                @endforeach
                                                @foreach($resultats_s as $resultat_s)
                                                <option value="{{ $resultat_s }}">{{ $resultat_s }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select multiple class="form-control selectpicker" name="papers[]" data-live-search="true">
                                                <option value="" disabled selected>Papiers : </option>
                                                @foreach($papers as $paper)
                                                <option value="{{ $paper->designation }}" selected>{{ $paper->designation }}</option>
                                                @endforeach
                                                @foreach($resultats_p as $resultat_p)
                                                <option value="{{ $resultat_p }}">{{ $resultat_p }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select  class="form-control selectpicker" name="wilaya" id="select-wilaya" data-live-search="true" required>
                                                <option value="" disabled selected>Wilaya : </option>
                                                <option value="{{ $wilaya->id }}"selected>{{ $wilaya->name }}</option>
                                                @foreach($wilayas as $wilaya)
                                                <option value="{{ $wilaya->id }}" @if($announcement->wilaya == $wilaya->name) selected @endif>{{ $wilaya->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select  class="form-control selectpicker" name="daira" id="select-daira" data-live-search="true" required>
                                                <option value="" disabled selected>Daira : </option>
                                                <option value="{{ $daira->id }}"selected>{{ $daira->name }}</option>
                                                @foreach($dairas as $daira)
                                                <option value="{{ $daira->id }}">{{ $daira->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Quartier *" name="quartier" value="{{ $announcement->quartie }}" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Lien map *"value="{{ $announcement->lien_map }}" name="map " >
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description courte" name="short_description">{{ $announcement->short_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Description"name="description">{{ $announcement->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <label>Photo principale * :</label>
                                        <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="image"  name="photoprincipale" accept="image/*" >
                                                <img src="{{asset('storage/images/properties/'.$announcement->images[0]->link)}}" width="243px " height="126px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Les photos secondaires* :</label>
                                        <div class="basic-form custom_file_input">
                                            <div class="input-group mb-3">
                                                <input type="file" class="image" multiple  name="photos[]" accept="image/*" >
                                                @foreach($images as $img)
                                                <img src="{{asset('storage/images/properties/'.$img->link)}}" width="200px " height="100px">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $category }}" name="category">
                                <input type ="hidden" value="{{ $type }}" name="type">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6 mt-2 text-center">
                                        <div class="form_group">
                                            <button type="submit" class="main-btn">Enregistrer</button>
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
