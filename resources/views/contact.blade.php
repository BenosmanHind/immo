@extends('layouts.front')
@section('content')
 <!--====== Start breadcrumbs-section ======-->
 <section class="breadcrumbs-section bg_cover" style="background-image: url(assets/images/bg/breadcrumbs-bg.jpg); background-color: #696969">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumbs-content text-center">
                    <h1>Contact</h1>
                    <ul class="link">
                        <li><a href="index.html">Accueil</a></li>
                        <li class="active">contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start contact-area ======-->
<section class="contact-area contact-area-v1 mb-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info-list">
                    <div class="list-item mb-30">
                        <i class="fal fa-map-marker-alt"></i>
                        <h5>Adresse</h5>
                        <p>208 Cité des jasmin kiffane. Tlemcen, Algérie</p>
                    </div>
                    <div class="list-item mb-30">
                        <i class="fal fa-envelope-open-text"></i>
                        <h5>Email</h5>
                        <p><a href="mailto:support@gmail.com">info@immo-plus.com</a></p>
                    </div>
                    <div class="list-item mb-30">
                        <i class="fal fa-phone"></i>
                        <h5>Téléphone</h5>
                        <p><a href="tel:+01234578967">+2135 58 xx xx xx</a></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-wrapper">
                    <form class="contact-form" id="contact-form" action="{{asset('/contact')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control" placeholder="Nom complet" id="name" required>
                                    <i class="fal fa-user"></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Email" id="email" required>
                                    <i class="fal fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea class="form_control" placeholder="Message" id="message" required></textarea>
                                    <i class="fal fa-pencil"></i>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            <div id="show_contact_msg" >

                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <button class="main-btn" type="submit">Envoyer</button>
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

@push('contact-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $("#contact-form").on("submit", function (e)
    {
        $('#show_contact_msg').html('<div >En cours....</div>');
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var formURL = $(this).attr("action");
        var data = {
            "_token": "{{ csrf_token() }}",
            name: name,
            email: email,
            message: message
        };

        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: data,
                    success: function (res) {
                        if (res === '1') {
                            $('#show_contact_msg').html('<div class="alert alert-success mt-2" id="form-success" role="alert"> Votre messgae à été bien envoyer !</div>');
                            $("#show_contact_msg").slideDown(200).delay(3500).slideUp(200);
                            $("#name").val('');
                            $("#email").val('');
                            $("#message").val('');
                        }
                    }
                });
        e.preventDefault();
    });

</script>
@endpush
