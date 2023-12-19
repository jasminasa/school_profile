@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('../../assets/edumint/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Event</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Event</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- event area start -->
    <div class="team-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($event as $e)
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $e->image) }}" alt="img">
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
                            <h4><a href="{{ route('events.show',$e->id) }}">{{ $e->title}}</a></h4>
                            <span> Date : {!! $e->startdate !!}</span><br>
                            <span>Time : {!! $e->starttime !!}-{!! $e->endtime!!}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- team area end -->
                <!-- <div class="col-12">
                    <nav class="td-page-navigation text-center">
                        <ul class="pagination">
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">3</a></li>
                            <li class="pagination-arrow"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </div>
    <!-- event area end -->
    @endsection