@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('../../assets/edumint/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">About Us</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>About Us</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about area start -->
    <div class="about-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-thumb-wrap after-shape"
                            style="background-image: url(' {{ asset('storage/' . $about[0]->image) }}');">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="about-inner-wrap">
                            <div class="section-title mb-0">
                                <h6 class="sub-title right-line">ABOUT US</h6>
                                <h2 class="title">{!! $about[0]->title !!}</h2>
                                <p class="content">{!! $about[0]->content !!},</p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- counter area start -->
    <div class="counter-area bg-gray">
        <div class="container">
            <div class="counter-area-inner pd-top-110 pd-bottom-120"
                style="background-image: url('../../assets/edumint/assets/img/other/1.png');">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="section-title mb-0">
                            <h6 class="sub-title right-line">History</h6>
                            <p class="content pb-3">{!! $about[0]->history !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 align-self-center">
                        <ul class="single-list-wrap">
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/1.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">{!! $why[0]->student !!}</span>+</h5>
                                        <p> Total Student</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/2.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">{!!  $why[0]->educator!!}</span>+</h5>
                                        <p>Total Educator</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-box-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/3.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><span class="counter">{!!  $why[0]->successstudent !!}</span>+</h5>
                                        <p>Successful students</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->

    <!--events-area start-->
    <div class="events-area pd-top-110 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-11">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">Visi Misi</h6>
                        <p class="title">{!!$about[0]->description!!}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="single-blog-list-wrap style-white" style="background-color: var(--heading-color);">
                        <li>
                            <div class="media single-blog-list-inner style-white">
                                <div class="media-left date">
                                    <span>Visi</span>
                                </div>
                                <div class="media-body details">
                                    <p><a href="blog-details.html">{!! $about[0]->visi !!}</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media single-blog-list-inner">
                                <div class="media-left date">
                                    <span>Misi</span>
                                </div>
                                <div class="media-body details">
                                    <p style="color:white">{!! $about[0]->misi!!}</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 align-self-center">
                    <div class="event-thumb">
                        <img src=" {{ asset('storage/' . $about[0]->image) }}" alt="img">
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    <!--events-area end-->
    @endsection