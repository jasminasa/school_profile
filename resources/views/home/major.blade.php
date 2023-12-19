@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url(' {{ asset('storage/' . $banner[0]->major) }}');">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Major</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Major</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog area start -->
    <div class="blog-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-12">
                    <div class="row">
                        @foreach($major as $m)
                        <div class="col-md-6">
                            <div class="single-course-inner">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $m->image) }}" alt="img">
                                </div>
                                <div class="details">
                                    <div class="details-inner">
                                        <div class="emt-user">
                                        </div>
                                        <h6>{{$m->title}}</h6>
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
                <div class="col-lg-4 order-lg-1 col-12">
                    <div class="td-sidebar mt-5 mt-lg-0">
                        <div class="widget widget_search">
                            <form class="search-form" action="{{url('majors')}}">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

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
    <!--blog-area start-->
    <div class="blog-area pd-top-80 pd-bottom-90 " style="backgroud-color:white;">
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
                                    <span class="date">{{$e->created_at}}</span>
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

    {!! $major->links() !!}
@endsection