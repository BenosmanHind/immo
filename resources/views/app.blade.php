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

    <div class="row d-flex justify-content-center">
            <a href="{{ asset('/app/announcement/create') }}" type="button" class="main-btn">Ajouter une annonce</a>
    </div>

</section>
 <!--====== Start Shop-List section ======-->
 <section class="shop-list-section shop-list-sidebar shop-grid-sidebar  pb-80 light-bg pt-10">
    <div class="container">
        <div class="text-center">
        <p>Vous avez <b>({{ $count_announcement }})</b> annonce(s) !</p>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
               <table class="table">
                    <tbody>
                        @foreach($announcements as $announcement)
                        <tr style="background-color:#ffff">
                            <th scope="row"> <img style="with:100px;height:100px" src="{{ asset('storage/images/properties/'.$announcement->images[0]->link) }}" class="img-fluid img-thumbnail" alt="Sheep"></th>
                            <td style="vertical-align: middle;">{{ $announcement->designation }}</td>
                            <td style="vertical-align: middle;">@if($announcement->status == 0) En attente @elseif($announcement->status == 1) Validé @else Annuler @endif</td>
                            <td style="vertical-align: middle;">
                                <a href="{{ asset('announcement/'.$announcement->slug) }}" class=" btn-xs sharp mr-1 "><i class="fa fa-eye"></i></a>
                                <a href="#" class=" btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                <button onclick="return confirm('Vous voulez vraiment supprimer?')" style="background-color: #ffff;"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr style="padding:3px;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--====== End Shop-List section ======-->


@endsection

