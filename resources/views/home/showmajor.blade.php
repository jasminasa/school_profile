@extends('home.master')

@section('content')

<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('../../assets/edumint/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Major Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Major Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

      <!-- course-single area start -->
      <div class="course-single-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-course-detaila-inner">
                        <div class="details-inner">
                            <h3 class="title">{{ $major->title }}</h3>
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $major->image) }}" alt="img">
                        </div>
                        <div class="tab-content" id="myTabContent">
                                    <p>{!! $major->desc !!}</p>
                                    <div id="accordion" class="accordion-area mt-4">
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-one">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" data-toggle="collapse" data-target="#f-one"
                                                        aria-expanded="true" aria-controls="f-one">
                                                        01. Overview
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-one" class="show collapse" aria-labelledby="ff-one"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    {!! $major->overview !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-two">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                        data-target="#f-two" aria-expanded="true" aria-controls="f-two">
                                                        02. Competention
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-two" class="collapse" aria-labelledby="ff-two"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    {!! $major->Competention !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card single-faq-inner style-no-border">
                                            <div class="card-header" id="ff-three">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-toggle="collapse"
                                                        data-target="#f-three" aria-expanded="true"
                                                        aria-controls="f-three">
                                                        03. Certification
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="f-three" class="collapse" aria-labelledby="ff-three"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    {!! $major->Certification !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="td-sidebar">
                        <div class="widget widget_feature">
                            <h4 class="widget-title">Majors Participant</h4>
                            <ul>
                                <li><i class="fa fa-user"></i><span>Students :</span> {{$major->student}} students</li>
                                <li><i class="fa fa-user"></i><span>Educator :</span> {{$major->educator}} teacher</li>
                                <li><i class="fa fa-user"></i><span>Success Student:</span> {{$major->successstudent}}</li>
                            </ul>
                            <div class="price-wrap text-center">
                                <a class="btn btn-base btn-radius" href="#">JOIN US NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pd-top-100">
            @foreach($major1 as $m)
                <div class="col-lg-4 col-md-6">
                    <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $m->image) }}" alt="img">
                                </div>
                                <div class="details">
                                    <div class="details-inner">
                                        <div class="emt-user">
                                        </div>
                                        <h6><a href="{{route('majors.show', $m->id)}}">{{$m->title}}</a></h6>
                                    </div>
                                    <div class="emt-course-meta">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> 
                                                    <i class="fa fa-star"></i> 
                                                    <i class="fa fa-star"></i> 
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="price text-right">
                                                   <span><a href="{{route('majors.show', $m->id)}}">Read More</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                    </div>
            @endforeach
            </div>

        </div>
    </div>
    <!-- course-single area end -->

    @endsection