<!DOCTYPE html>
<html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>Immo+</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset('front/assets/images/favicon.ico') }}" type="image/png">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/fonts/fontawesome/css/all.css') }}">
        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/fonts/flaticon/flaticon.css') }}">
        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
        <!--====== Slick css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/slick.css') }}">
              <!-- jquery-ui css-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/jquery-ui.min.css') }}">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/default.css') }}">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{ asset('plugins/star-rating-svg.css') }}" />
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{asset('front/assets/uploader/drop_uploader.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    </head>

    <style >
        .bootstrap-select .dropdown-toggle .filter-option {
  text-align: left;
  padding-top: 14px!important;
}
.btn-light{
    height: 65px!important;
}

.company-section::after {

  opacity: 0.9!important;
}
    </style>
    <body>
        <!--====== Start Preloader ======-->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div><!--====== End Preloader ======-->
        <!--====== Start Header ======-->
        <header class="header-area header-area-v2">
            <div class="header-top" style="background-color: #000;padding: 10px 0;">
                <div class="custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="top-left">
                                <a href="#" class="logo"><img  height="68%" width="68%" src="{{ asset('front/assets/images/logo.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-middle">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="info-box">
                                            <i class="fal fa-phone"></i>
                                            <span style="color: #fff">Téléphone</span>
                                            <h5 style="color: #fff">+2135 58 xx xx xx</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="info-box">
                                            <i class="fal fa-clock"></i>
                                            <span style="color: #fff">Les heurs de travail </span>
                                            <h5 style="color: #fff">samedi-jeudi, 9am - 7pm</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="top-right">
                                <form>
                                    <div class="form_group">
                                        <input type="search" placeholder="Rechercher" name="search">
                                        <i class="far fa-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-navigation red-bg" style="background-color: #e8c819">
                <div class="custom-container">
                    <div class="nav-container d-flex align-items-center justify-content-between">
                        <!-- site logo -->
                        <div class="brand-logo">
                            <a href="#"><img src="{{ asset('front/assets/images/logo-1.png') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="nav-menu">
                            <!-- Navbar Close Icon -->
                            <div class="navbar-close">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- nav-menu -->
                            <nav class="main-menu">
                                <ul>
                                    <li class="menu-item active"><a href="{{ asset('/') }}">Accueil</a>
                                    </li>
                                    <li class="menu-item"><a href="#">Services</a></li>
                                    <li class="menu-item"><a href="{{ asset('/about') }}">A propos</a></li>
                                    <li class="menu-item"><a href="{{ asset('/contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- nav pushed item -->
                            <div class="nav-pushed-item">
                                <div class="navbar-btn">
                                    <a href="contact.html" class="main-btn">Get A Quote</a>
                                </div>
                            </div>
                        </div>
                        <!-- nav push item -->
                        <div class="nav-push-item">
                            <div class="nav-tools">
                                <div class="dropdown show">
                                <ul>
                                    <li><a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"  aria-expanded="false"><i class="fal fa-user-circle "></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @auth
                                        <a class="dropdown-item" href="{{ asset('/app') }}" style="color :#000">Dashboard</a>
                                        <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                           <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                           <span class="ml-2" style="color:#000">Déconnexion </span>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                                       </a>
                                        @else
                                        <a class="dropdown-item" href="{{ asset('/login') }}" style="color :#000">Connexion</a>
                                        <a class="dropdown-item" href="{{ asset('/register') }}" style="color :#000">Inscription</a>
                                        @endauth
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ asset('/favorite') }}">
                                            <i class="fal fa-heart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger nbr-favorit">{{ $count_favorite_lines }}</span>
                                        </a>
                                    </li>
                                    <li><a href="#" class="menu-icon"><img src="{{ asset('front/assets/images/bar-2.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <!-- Navbar Toggler -->
                        <div class="navbar-toggler">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-sidemenu">
                <div class="panel-overly"></div>
                <div class="sidemenu-nav">
                    <a href="#" class="cross-icon"><i class="far fa-times"></i></a>
                    <ul class="sidebar-menu">
                        <li class="menu-item"><a href="{{ asset('/') }}">Accueil</a>
                        </li>
                        <li class="menu-item"><a href="#">Services</a></li>
                        <li class="menu-item"><a href="#">A propos</a></li>
                        <li class="menu-item"><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </header><!--====== End Header ======-->

        @yield('content')

         <!--====== Start Footer ======-->
         <footer class="footer-area black-bg">
            <div class="container">
                <div class="footer_widget pt-80 pb-65">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget about-widget">
                                <img src="assets/images/logo-2.png" class="img-fluid" alt="">
                                <p>Conditions Générales d'Utilisation <br>
                                    Politique Générale de Protection des Données<br>
                                    Charte éditeur<br>
                                    Paramétrer mes cookies</p>
                                <div class="social-box">
                                    <h5>Suivez-nous</h5>
                                    <ul class="social-link">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget quick-links-widget">
                                <h4 class="widget-title">Service pro</h4>
                                <ul class="link">
                                    <li><a href="#">Tous nos services pro</a></li>
                                    <li><a href="#">Accès client</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget quick-links-widget">
                                <h4 class="widget-title">A propos</h4>
                                <ul class="link">
                                    <li><a href="shop-grid.html">Accueil</a></li>
                                    <li><a href="shop-grid.html">Services</a></li>
                                    <li><a href="shop-grid.html">a propos</a></li>
                                    <li><a href="shop-grid.html">contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget contact-widget">
                                <h4 class="widget-title">Contact</h4>
                                <ul class="contact-info">
                                    <li>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>250 Main Street. 2nd Floor D - Block, New York</p>
                                    </li>
                                    <li>
                                        <i class="fal fa-envelope"></i>
                                        <p><a href="mailto:supportinfo@gmail.com">info@immo-plus.com</a></p>
                                    </li>
                                    <li>
                                        <i class="fal fa-phone"></i>
                                        <p><a href="tel:+89812345698">+2135 58 xx xx xx
                                        </a></p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text text-center">
                                <P>&copy; Copyright 2023 <span>immo+.</span></P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--====== End Footer ======-->
        <!--====== back-to-top ======-->
    <a href="#" class="back-to-top" ><i class="fas fa-angle-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <!--====== Jquery js ======-->
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
    <!--====== Slick js ======-->
    <script src="{{ asset('front/assets/js/slick.min.js') }}"></script>
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--====== Isotope js ======-->
    <script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
    <!--====== Imagesloaded js ======-->
    <script src="{{ asset('front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!--====== jquery-ui js  ======-->
    <script src="{{ asset('front/assets/js/jquery-ui.min.js') }}"></script>
    <!--====== Syotimer js  ======-->
    <script src="{{ asset('front/assets/js/jquery.syotimer.min.js') }}"></script>
    <!--====== Main js ======-->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script src="{{asset('front/assets/uploader/drop_uploader.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- rating -->
    <script type="text/javascript" src="{{ asset('plugins/jquery.star-rating-svg.js') }}"></script>
    <script>

        $(document).ready(function(){
        $('.image').drop_uploader({
            uploader_text: 'Déposez les fichiers à télécharger ou ',
            browse_text: 'parcourez',
            only_one_error_text: 'Only one file allowed',
            not_allowed_error_text: 'File type is not allowed',
            big_file_before_error_text: 'Files, bigger than',
            big_file_after_error_text: 'is not allowed',
            allowed_before_error_text: 'Only',
            allowed_after_error_text: 'files allowed',
            browse_css_class: 'button button-primary',
            browse_css_selector: 'file_browse',
            uploader_icon: '',
            file_icon: '',
            progress_color: '#4a90e2',
            time_show_errors: 5,
            layout: 'thumbnails',
            method: 'normal',
            chunk_size: 1000000,
            concurrent_uploads: 5,
            show_percentage: true,
            existing_files: false,
            existing_files_removable: true,
            send_existing_files: false,
            url: 'ajax_upload.php',
            delete_url: 'ajax_delete.php',
        });
    });


        </script>

        <script>

            $(".my-rating").starRating({
                starSize: 25,
                initialRating: 3.5,
            });

            let rate =$('#rate-result').val();

            $(".rating-result").starRating({
                starSize: 25,
                initialRating: rate,
                readOnly: true
            });

        </script>
    @stack('go-step-two-scripts')
    @stack('select-wilaya-script')
    @stack('contact-scripts')
    @stack('modal-delete-script')
    @stack('comment-scripts')
    @stack('delete-line')
    @stack('script-alert')
    </body>
</html>
