@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('../../assets/edumint/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Event Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Event Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- course-single area start -->
    <div class="course-single-area pd-top-120 pd-bottom-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-12">
                    <div class="event-detaila-inner">
                        <div class="thumb mb-4">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="img">
                        </div>
                        <ul class="event-meta">
                            <li><i class="fa fa-clock-o"></i> {!! $event->starttime !!}- To {!! $event->endtime !!}-</li>
                            <li><i class="fa fa-map-marker"></i> {{ $event->location }}</li>
                        </ul>
                        <h4>{{ $event->title}}</h4>
                        <p>{!! $event->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div class="td-sidebar">
                        <div class="widget widget_event">
                            <h4 class="widget-title text-white">Event Info :</h4>
                            <ul>
                                <li><i class="fa fa-calendar"></i>Start Date: {!! $event->startdate !!}</li>
                                <li><i class="fa fa-clock-o"></i>Start Time: {!! $event->starttime !!}</li>
                                <li><i class="fa fa-calendar"></i>End Date: {!! $event->enddate !!}</li>
                                <li><i class="fa fa-clock-o"></i>End Time: {!! $event->endtime !!}</li>
                                <li><i class="fa fa-ticket"></i>Theme: {{ $event->theme }}</li>
                                <li><i class="fa fa-map-marker"></i>Location: {{ $event->location }}</li>
                            </ul>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Location</h4>
                            <div class="widget-g-map">
                                "{!! $event->map !!}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- course-single area end -->
    @endsection
