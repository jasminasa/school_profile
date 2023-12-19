@extends('home.master')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area bg-overlay" style="background-image:url('assets/img/bg/3.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title mb-0 text-center">
                    <h2 class="page-title">Blog</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog area start -->
    <div class="blog-area pd-top-120 pd-bottom-120">
    <div class="container">
    <div class="widget widget_search col-lg-6" >
        <form class="search-form" action="{{url('blogs')}}">
            <div class="form-group">
                <input type="search" name="search" placeholder="Search">
            </div>
            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <br><br>
            <div class="row">
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
                            <a class="read-more-text" href="{{route('blogs.show', $b->id)}}">READ MORE <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/5.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h5 class="title"><a href="blog-details.html">Quisque suscipit ipsum est, eu venen leo</a>
                            </h5>
                            <p>Lorem ipsum dolor sit amet sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/6.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h5 class="title"><a href="blog-details.html">When MTV ax quiz prog Flock by graced</a></h5>
                            <p>Lorem ipsum dolor sit amet sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/5.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h5 class="title"><a href="blog-details.html">Flock by when MTV ax quiz prog quiz graced</a>
                            </h5>
                            <p>Lorem ipsum dolor sit amet sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/6.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h5 class="title"><a href="blog-details.html">Quisque suscipit ipsum est, eu venen leo</a>
                            </h5>
                            <p>Lorem ipsum dolor sit amet sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-inner style-border">
                        <div class="thumb">
                            <img src="assets/img/blog/7.png" alt="img">
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i> BY ADMIN</li>
                                <li><i class="fa fa-calendar-check-o"></i> 28 JANUARY, 2020</li>
                            </ul>
                            <h5 class="title"><a href="blog-details.html">When MTV ax quiz prog Flock by graced</a></h5>
                            <p>Lorem ipsum dolor sit amet sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna</p>
                            <a class="read-more-text" href="blog-details.html">READ MORE <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </div>
    <!-- blog area end -->
    {!! $blog->links() !!}
    @endsection