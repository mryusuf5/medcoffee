<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>MedCoffee</title>
</head>
<body>
<header id="header" class="{{Route::is('showProduct') || Route::is('cart') ? 'bg-dark' : ''}}">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
                    <ul>
                        <li>
                            <a href="tel:+31 615 123 456">+31 615 123 456</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="img/logo.png" alt="" title=""/></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="{{route('home')}}#coffee" class="fs-2">Products</a></li>
                    <li>
                        <a href="{{route('cart')}}">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-basket-shopping"></i>&nbsp;
                                <span class="badge rounded-circle bg-primary d-flex align-items-center
                                    justify-content-center" style="width: 25px; height: 25px">
                                    {{Session::get('cart') !== null ? count(Session::get('cart')) : '0'}}
                                    </span>
                            </div>
                        </a>
                    </li>
                    {{--                        <li class="menu-has-children"><a href="">Pages</a>--}}
                    {{--                            <ul>--}}
                    {{--                                <li><a href="generic.html">Generic</a></li>--}}
                    {{--                                <li><a href="elements.html">Elements</a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </li>--}}
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
{{$slot}}
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua.
                    </p>
                    <p class="footer-text">
                        Copyright MedCoffee &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | Build by
                        <a href="https://yusufyildiz.nl" target="_blank">Yusuf Yildiz</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/easing.min.js')}}"></script>
<script src="{{asset('js/hoverIntent.min.js')}}"></script>
<script src="{{asset('js/superfish.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/parallax.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="{{asset('js/user/products.js')}}"></script>
@yield('scriptsBottomUser')
</body>
</html>
