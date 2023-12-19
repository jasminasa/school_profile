@extends('home.master')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Blog Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Details</li>
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
                <div class="col-lg-8">
                    <div class="blog-details-page-content">
                        <div class="single-blog-inner">
                            <div class="thumb">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="img">
                            </div>
                            <div class="details">
                                <ul class="blog-meta">
                                `   <li><i class="fa fa-user"></i> {{$blog->writer}} </li>
                                    <li><i class="fa fa-calendar-check-o"></i> {{$blog->created_at}}</li>
                                </ul>
                                <h3 class="title">{{$blog->title}}</h3>
                                <p>{!!$blog->content!!}</p>
                            </div>
                        </div>
                        <div class="tag-and-share">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="blog-share">
                                        <h6>Share :</h6>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="td-sidebar">
                        <div class="widget widget_search">
                            <form class="search-form" action="{{url('blogs')}}">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Search">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Catagory</h4>
                            <ul class="catagory-items">
                                @foreach($category as $c)
                                <li><a href="{{route('categories.show', $c->id)}}">{{$c->category}} <i class="fa fa-caret-right"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-recent-post">
                            <h4 class="widget-title">Recent News</h4>
                            <ul>
                            @foreach($blog1 as $b1)
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img style="max-width: 75px; max-height: 75px;" src="{{ asset('storage/' . $b1->image) }}" alt="blog">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h5 class="title"><a href="{{route('blogs.show', $b1->id)}}">{{$b1->title}}</a></h5>
                                            <div class="post-info"><i class="fa fa-calendar"></i><span>{{$b1->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->
    @endsection