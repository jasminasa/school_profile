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
            <div class="row">
            @foreach($blog as $b)
            @if($category->category == $b->category)
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
                @else
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- blog area end -->
    @endsection