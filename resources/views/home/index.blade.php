@extends('home.master')

@section('content')
    
      <!-- banner start -->
      <div class="banner-area banner-area-1 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 order-lg-12 align-self-center">
                    <div class="thumb b-animate-thumb">
                        <img src="../../assets/edumint/assets/img/banner/1.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1 align-self-center">
                    <div class="banner-inner text-center text-lg-left mt-5 mt-lg-0">
                        <h6 class="b-animate-1 sub-title">DISCOVER RESEARCH</h6>
                        <h1 class="b-animate-2 title">A better learning future starts here</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->    

    
    <!-- about area start -->
    <div class="about-area pd-top-140">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                @foreach ($about as $a)
                    <div class="col-lg-6">
                        <div class="about-thumb-wrap left-icon" style="background-image: url('{{ asset('storage/' . $a->image) }}');">
                            <div class="about-icon"><img src="../../assets/edumint/assets/img/icon/4.png" alt="img"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-inner-wrap pl-xl-4 pt-5 pt-lg-0 mt-5 mt-lg-0">  
                            <div class="section-title mb-0">
                                <h6 class="sub-title right-line">ABOUT US</h6>
                                <h2 class="title">{{ $a->title }}</h2>
                                <p class="content">{!! $a->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- course area start -->
    <div class="course-area pd-top-100 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-11">
                    <div class="section-title style-white text-center">
                        <h2 class="title">Top Featured Majority</h2>
                    </div>
                </div>
            </div>
        
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <div class="row">
                        @foreach($major as $m)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $m->image) }}" alt="img">
                                </div>
                                <div class="details">
                                    <div class="details-inner">
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
                                                    <a href="{{route('majors.show', $m->id)}}">Read More</a>
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
        </div>
    </div>
    <!-- course area End -->

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
    <div class="testimonial-area pd-top-100">
        <div class="container">
            <div class="testimonial-area-inner bg-cover"  style="background-image: url('../../assets/edumint/assets/img/other/2.png');">
            @foreach($about as $a)
                <img class="testimonial-right-img" src="{{ asset('storage/' . $a->image) }} " alt="img">
            @endforeach
                <div class="testimonial-slider owl-carousel">
                    @foreach($testimonial as $t)
                    <div class="item">
                        <div class="single-testimonial-inner style-white">
                            <span class="testimonial-quote"><i class="fa fa-quote-left"></i></span>
                            <p class="mb-4">{!!$t->content!!}</p>
                            <div class="media testimonial-author">
                                <div class="media-left">
                                    <img src="{{ asset('storage/' . $t->image) }} " alt="img">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <h6>{{$t->name}}</h6>
                                    <p>{{$t->agency}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!-- team area start -->
    <div class="team-area pd-top-110">
        <div class="container-fluid pl-4 pr-4">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">Meet Our Tutor</h6>
                        <h2 class="title">Best Instructor On School</h2>
                    </div>
                </div>
            </div>
            <div class="team-slider owl-carousel">
                @foreach($tutor As $t)
                <div class="item">
                    <div class="single-team-inner">
                        <div class="thumb">
                            <img src="{{ asset('storage/' . $t->image) }} " alt="img">
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
                            <h4><a href="{{route('tutors.show', $t->id)}}">{{ $t->name }}</a></h4>
                            <span>{!! $t->Department !!}</span>
                        </div>  
                    </div>
                </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
    <!-- team area end -->

    <!--blog-area start-->
    <div class="blog-area pd-top-80 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center">
                        <h6 class="sub-title double-line">Latest News</h6>
                        <h2 class="title">Our Insights & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <ul class="single-blog-list-wrap mb-5 mb-lg-0">
                        @foreach($event as $e)
                        <li>
                            <div class="media single-blog-list-inner">
                                <div class="media-left date">
                                    <div class="about-icon"><img src="../../assets/edumint/assets/img/icon/1.png" alt="img"></div>  
                                </div>
                                <div class="media-body details">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-calendar"></i> {{$e->startdate}}</li>
                                        <li><i class="fa fa-map"></i>{{$e->location}}</li>
                                    </ul>
                                    <h5><a href="{{route('events.show', $e->id)}}">{{$e->title}}</a></h5>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        @foreach($blog as $b)
                        <div class="col-md-6">
                            <div class="single-blog-inner">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $b->image) }}" alt="img">
                                    <span class="date">{{$b->created_at}}</span>
                                </div>
                                <div class="details">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-user"></i> {{$b->writer}}</li>
                                        <li><i class="fa fa-folder-open-o"></i> {{$b->category}}</li>
                                    </ul>
                                    <h5>{{$b->title}}</h5>
                                    <a class="read-more-text" href="blog-details.html">READ MORE <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog-area end-->

    <!--contact-area start-->
    <div class="contact-area bg-overlay mt-200 pd-bottom-90" style="background-image: url('../../assets/edumint/assets/img/banner/2.png');">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
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
                    <form class="contact-form-inner mt-mn-200 style-shadow" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        <div class="section-title">
                        @csrf
                            <h2 class="title">Request A Quote</h2>
                            <p>We will be happy to answer your questions.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <input type="text" name="firstname" class="form-control" id="exampleInputPassword1" placeholder="First Name" value="{{ old('firstname') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <input type="text" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Last Name" value="{{ old('lastname') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <input type="text" name="subject" class="form-control" id="exampleInputPassword1" placeholder="Subject" value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <textarea id="massage" type="text" name="massage" class="form-control" value="{{ old('massage') }}" placeholder="Massage" style="height: 200px;"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {!! NoCaptcha::renderJs('en', false, 'onloadCallback') !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <button type="submit" class="btn btn-base">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 align-self-end">
                @foreach($contact as $c)
                    <div class="mt-5 mt-lg-0">
                        <ul class="single-list-wrap">
                            <li class="single-list-inner style-white style-check-box-grid-2">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/16.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5>Our Address</h5>
                                        <p>{{ $c->address }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-white style-check-box-grid-2">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/17.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5>Our Phone</h5>
                                        <p>+{{ $c->telp }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-list-inner style-white style-check-box-grid-2">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../../assets/edumint/assets/img/icon/18.png" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5>Our Email</h5>
                                        <p>{{ $c->email }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--contact-area end-->
    @endsection