@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Instructor</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Instructor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- team area start -->
    <div class="team-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($tutor as $t)
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $t->image) }}" alt="img">
                            <div class="social-wrap">
                                <div class="social-wrap-inner">
                                    <a class="social-share" href="#"><i class="fa fa-share-alt"></i></a>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="{{ route('tutors.show',$t->id) }}">{{ $t->name }}</a></h4>
                            <span>{!! $t->Department !!}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- team area end -->

    <!-- counter area start -->
    <div class="counter-area bg-gray">
        <div class="container">
            <div class="counter-area-inner pd-top-120 pd-bottom-120" style="background-image: url('../../assets/edumint/assets/img/other/1.png');">
                <div class="row">
                    @foreach($why  as $w)
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="section-title mb-0">
                            <h6 class="sub-title right-line">Why Us</h6>
                            <h2 class="title">{{ $w->title }}</h2>
                            <p class="content pb-3">{!! $w->description !!}</p>
                            <div class="btn-counter bg-base mt-4">
                                <div class="right-val align-self-center">
                                    Berdiri <br> Sejak
                                </div>
                                <h3 class="left-val align-self-center"><span class="counter">{{ $w->year }}</span></h3>
                            </div>
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
                                        <h5><span class="counter">{{ $w->student }}</span>+</h5>
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
                                        <h5><span class="counter">{{ $w->educator }}</span>+</h5>
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
                                        <h5><span class="counter">{{ $w->successstudent }}</span>+</h5>
                                        <p>Successful students</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->


       <!-- testimonial area start -->
       <div class="testimonial-area pd-top-110 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">Client Testimonials</h6>
                        <h2 class="title">What our clients say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($testimonial as $t)
                <div class="col-md-6">
                    <div class="single-testimonial-inner m-0">
                        <div class="media testimonial-author mb-4">
                            <div class="media-left">
                                <img src="{{ asset('storage/' . $t->image) }} " alt="img">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <h6>{{$t->name}}</h6>
                                <p>{{$t->agency}}</p>
                            </div>
                        </div>
                        <span class="testimonial-quote"><i class="fa fa-quote-left"></i></span>
                        <p class="mb-0">{!!$t->content!!}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    @endsection