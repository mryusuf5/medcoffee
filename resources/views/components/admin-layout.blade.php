<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <title>MedCoffee</title>

    <meta name="description" content="" />

{{--    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
{{--    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('css/admin/core.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/theme-default.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}" />
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">--}}

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('css/admin')}}css/admin/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('js/admin/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('js/admin/config.js')}}"></script>
    @yield('scriptTop')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="#" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <img class="headerLogo" src="{{asset('images/logo2.png')}}" alt="">
                  </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{route('home')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-globe text-primary"></i>
                        <div data-i18n="Analytics">Website</div>
                    </a>
                </li>
                <li class="menu-item {{Route::is('admin.productcategories.index')
                                        || Route::is('admin.productcategories.show') ? 'active' : ''}}">
                    <a href="{{route('admin.productcategories.index')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-sitemap text-primary"></i>
                        <div data-i18n="Analytics">Product categorieën</div>
                    </a>
                </li>
{{--                <li class="menu-item">--}}
{{--                    <a href="#" class="menu-link gap-2">--}}
{{--                        <i class="fa-solid fa-mug-saucer text-primary"></i>--}}
{{--                        <div data-i18n="Analytics">Producten</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item">--}}
{{--                    <a href="#" class="menu-link gap-2">--}}
{{--                        <i class="fa-solid fa-dumbbell text-primary"></i>--}}
{{--                        <div>Wirken workouts</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item">--}}
{{--                    <a href="#" class="menu-link gap-2">--}}
{{--                        <i class="fa-solid fa-users text-primary"></i>--}}
{{--                        <div>Klanten</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="menu-item">--}}
{{--                    <a href="#" class="menu-link gap-2">--}}
{{--                        <i class="fa-solid fa-chart-line text-primary"></i>--}}
{{--                        <div>Grafieken</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="menu-item">
                    <a href="#" class="menu-link gap-2 position-relative">
                        <i class="fa-solid fa-envelope text-primary"></i>
                        <div class="position-relative">
                            Contact berichten
                            <span class="badge rounded-pill bg-danger">
{{--                                @if(count($contact_messages) < 9)--}}
{{--                                    {{count($contact_messages)}}--}}
{{--                                @else--}}
{{--                                    9+--}}
{{--                                @endif--}}
                                0
                            </span>
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.logout')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-right-from-bracket text-primary"></i>
                        <div>Loguit</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none p-2">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="fa-solid fa-bars fs-3 text-primary"></i>
                </a>
            </div>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-fluid flex-grow-1 container-p-y">
                    <!-- Layout Demo -->
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <h3 class="text-success">{{$message}}</h3>
                        </div>
                    @endif
                    <h3>{{$title ?? ''}}</h3>
                    @isset($backRoute)
                        <a href="{{$backRoute}}" class="btn btn-primary mb-4"><i class="fa-solid fa-angle-left"></i> Terug</a>
                    @endisset
                    {{$slot}}
                    <!--/ Layout Demo -->
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="{{asset('js/admin/jquery.js')}}"></script>
<script src="{{asset('js/admin/popper.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.js')}}"></script>
<script src="{{asset('js/admin/perfect-scrollbar.js')}}"></script>
<script src="{{asset('js/admin/menu.js')}}"></script>
<script src="{{asset('js/admin/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/admin/script.js')}}"></script>
@yield('scriptBottom')
</body>
</html>
