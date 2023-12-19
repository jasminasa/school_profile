<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{$metadata[0]->metakeyword}}">
    <meta name="search engines" content="{{$metadata[0]->metasearch}}">
    <meta name="description" content="{{$metadata[0]->metadesc}}">
    <meta name="author" content="{{$metadata[0]->metaauthor}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edumint - Edumint LMS & Online Courses Html Template</title>
    @foreach($config as $cf)
    <link rel=icon href="{{ asset('storage/' . $cf->favicon) }} " sizes="20x20" type="image/png">
    @endforeach

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../../assets/edumint/assets/css/vendor.css">
    <link rel="stylesheet" href="../../../assets/edumint/assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/edumint/assets/css/responsive.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- navbar start -->
    <div class="navbar-area">
        <!-- navbar top start -->
        <div class="navbar-top">
            <div class="container">
                <div class="row">
                    @foreach ($contact as $c)
                    <div class="col-md-8 text-md-left text-center">
                        <ul>
                            <li><p><i class="fa fa-map-marker"></i> {{ $c->address }}</p></li>
                            <li><p><i class="fa fa-envelope-o"></i>  {{ $c->email }}</p></li>
                        </ul>
                    </div>
                    @endforeach

                    @foreach($config as $cf)
                    <div class="col-md-4">
                        <ul class="topbar-right text-md-right text-center">
                            <li class="social-area">
                                <a href="{{ $cf->fb }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="{{ $cf->twit }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="{{ $cf->ig }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="{{ $cf->pin }}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <nav class="navbar bg-white navbar-area-1 navbar-area navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                @foreach($config as $cf)
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('storage/' . $cf->logo) }} " alt="img"></a>
                </div>
                @endforeach
                <div class="collapse navbar-collapse" id="edumint_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li class=" current-menu-item"><a href="/">Home</a></li>
                        <li class=""><a href="{{ url('majors') }}">Major</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('abouts') }}">About Us</a></li>
                                <li><a href="{{ url('events') }}">Event</a></li>
                                <li><a href="{{ url('tutors') }}">Instructor</a></li>
                                <li><a href="{{ url('galleries') }}">Gallery</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="{{ url('blogs') }}">Blog</a></li>
                        <li><a href="{{ url('contacts') }}">Contact Us</a></li>
                    </ul>
                </div>
                @foreach($contact as $c)
                <div class="nav-right-part nav-right-part-desktop">
                    <a class="btn btn-base" href="https://wa.me/{{$c->telp}}">Join Now</a>
                </div>
                @endforeach
            </div>
        </nav>
    </div>
    <!-- navbar end -->

    @yield('content')
    
    <!-- footer area start -->
    <footer class="footer-area bg-gray">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    @foreach($contact as $c)
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_contact">
                            <h4 class="widget-title">Contact Us</h4>
                            <ul class="details">
                                <li><i class="fa fa-map-marker"></i> {{ $c->address }}</li>
                                <li><i class="fa fa-envelope"></i> {{ $c->email }}</li>
                                <li><i class="fa fa-phone"></i>+{{ $c->telp }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget_nav_menu">
                            <h4 class="widget-title">Major</h4>
                            <ul>
                                @foreach($majorsss as $m)
                                <li><a href="{{route('majors.show', $m->id)}}">{{$m->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @foreach($config as $cf)
                    <div class="col-lg-6 col-md-12">
                        <div class="widget widget_contact">
                            <h4 class="widget-title">Map</h4>
                            {!! $cf->map !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('storage/' . $cf->logo) }} " alt="img"></a>
                    </div>
                    <div class="col-lg-4  col-md-6 order-lg-12 text-md-right align-self-center">
                        <ul class="social-media mt-md-0 mt-3">
                            <li><a class="facebook" href="{{ $cf->fb }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="{{ $cf->twit }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="instagram" href="{{ $cf->ig }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="youtube" href="{{ $cf->yt }}"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="pinterest" href="{{ $cf->pin }}"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    @endforeach
                    <div class="col-lg-4 order-lg-8 text-lg-center align-self-center mt-lg-0 mt-3">
                        <p>copyright 2021 by SolverWp</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="../../../assets/edumint/assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="../../../assets/edumint/assets/js/main.js"></script>
</body>
</html>
