@extends('home.master')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Instructor Details</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Instructor Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- team details page -->
    <div class="main-blog-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="team-details-page">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $tutor->image) }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-7 align-self-center mt-5 mt-lg-0">
                        <div class="details">
                            <h3>{{$tutor->name}}</h3>
                            <span class="designation">{!!$tutor->Department!!}</span>
                            <p class="mt-3">{!! $tutor->description!!} </p>
                            <ul class="social-media style-base pt-4">
                                <li>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team details page end -->
    @endsection