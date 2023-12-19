@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('../../assets/edumint/assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Contact</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact list start -->
<div class="contact-list pd-top-120 pd-bottom-90">
        <div class="container">
            @foreach($contact as $c)
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="../../assets/edumint/assets/img/icon/17.png" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Phone</h5>
                                <p>{{$c->telp}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="../../assets/edumint/assets/img/icon/18.png" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Email</h5>
                                <p>{{$c->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-list-inner">
                        <div class="media">
                            <div class="media-left">
                                <img src="../../assets/edumint/assets/img/icon/16.png" alt="img">
                            </div>
                            <div class="media-body align-self-center">
                                <h5>Our Address</h5>
                                <p>{{$c->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact list end -->

    <!-- counter area start -->
    <div class="counter-area pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title mb-0">
                        <h6 class="sub-title right-line">Get in touch</h6>
                        <h2 class="title">{{$c->title}}</h2>
                        <p class="content pb-3">{{$c->description}} </p>
    @endforeach

                        @foreach($config as $cf)
                        <ul class="social-media style-base pt-3">
                        <li><a class="facebook" href="{{ $cf->fb }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="{{ $cf->twit }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="instagram" href="{{ $cf->ig }}"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="youtube" href="{{ $cf->yt }}"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="pinterest" href="{{ $cf->pin }}"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 mt-5 mt-lg-0">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="contact-form-inner  mt-5 mt-md-0" action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="firstname" class="form-control" id="exampleInputPassword1" placeholder="First Name" value="{{ old('firstname') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Last Name" value="{{ old('lastname') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="single-input-inner style-bg-border">
                                    <input type="text" name="subject" class="form-control" id="exampleInputPassword1" placeholder="Subject" value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner style-bg-border">
                                    <textarea id="massage" type="text" name="massage" class="form-control" value="{{ old('massage') }}" placeholder="Massage" style="height: 200px;"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! NoCaptcha::renderJs('en', false, 'onloadCallback') !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->
    @endsection