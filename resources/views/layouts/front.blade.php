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
        <!--====== nice-select css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/nice-select.css') }}">
        <!-- jquery.nice-number css-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/jquery.nice-number.css') }}">
        <!-- jquery-ui css-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/jquery-ui.min.css') }}">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/default.css') }}">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    </head>

    <style>

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
                                        <input type="search" placeholder="Search" name="search">
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
                                    <li class="menu-item active"><a href="#">Accueil</a>
                                    </li>
                                    <li class="menu-item"><a href="#">Services</a></li>
                                    <li class="menu-item"><a href="#">A propos</a></li>
                                    <li class="menu-item"><a href="#">Contact</a></li>
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
                                <ul>
                                    <li><a href="#"><i class="fal fa-user-circle"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#" class="menu-icon"><img src="{{ asset('front/assets/images/bar-2.png') }}" alt=""></a></li>
                                </ul>
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
                        <li class="menu-item"><a href="#">Accueil</a>
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
    <!--====== Jquery js ======-->
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/popper.min.js') }}"></script>
    <!--====== Slick js ======-->
    <script src="{{ asset('front/assets/js/slick.min.js') }}"></script>
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--====== Isotope js ======-->
    <script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
    <!--====== Imagesloaded js ======-->
    <script src="{{ asset('front/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!--====== nice-select js ======-->
    <script src="{{ asset('front/assets/js/jquery.nice-select.min.js') }}"></script>
    <!--====== select number ======-->
    <script src="{{ asset('front/assets/js/jquery.nice-number.min.js') }}"></script>
    <!--====== jquery-ui js  ======-->
    <script src="{{ asset('front/assets/js/jquery-ui.min.js') }}"></script>
    <!--====== Syotimer js  ======-->
    <script src="{{ asset('front/assets/js/jquery.syotimer.min.js') }}"></script>
    <!--====== Main js ======-->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    </body>
</html>
