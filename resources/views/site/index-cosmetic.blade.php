@extends('site/app')
   @include('site/layouts/header')
    @include('site/layouts/slider')
@section('main_content')
 <!--  Top Banner Area Start -->
        <div class="banner-area pt-20 pb-90">
            <div class="container">
                <div class="row">
                     @foreach($banners as $banner)
                    <!--  Single Banner Area Start -->
                    <div class="col-lg-4 col-md-4 mb-sm-30">
                        <div  class="zoom">
                            <a href="#">
                                <img  style="width::377px;hight:230px;" src="{{asset('public/pictures/banner/'.$banner->img)}}" alt="banner-img">
                            </a>
                        </div>
                    </div>
                    <!--  Single Banner Area End -->
                   @endforeach
                </div>
            </div>
        </div>
        <!--  Top Banner Area End -->
        
        
        <!-- Blog Area Start Here -->
        <div class="blog-area ">
            <div class="container">
                <div class="main-blog-area ">
                    @if(count($sections) > 0)
                    @foreach($sections as $section)
                    <div id="{{$section->name}}">
                    <!-- Section Title Start -->
                    <div class="section-title text-center ">
                        <h2>{{$section->name}}</h2>
                        <p>اخر  المواضيع المتجددة في عالم {{$section->name}}</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Blog Activation Start -->
                    <div class="blog-activation owl-carousel">
                        
                        @foreach($posts as $post)
                        <!-- Single Blog Start -->
                        @if($post->section_id == $section->id)
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="{{route('details', $post->slug)}}">
                                    <img style="width:363px;height: 248px;" 
                            src="{{asset('public/pictures/post/'.$post->img) }}">
                                </a>
                                <div class="entry-meta">
                                    <div class="entry-meta">
                                        <div class="date">
                                            <p>{{$post->view_count}}</p>
                                            <span>مشاهدة</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h4>
                                    <a href="{{route('details', $post->slug)}}">{{$post->title}}</a>
                                </h4>
                                <ul class="meta-box">
                                    <li class="meta-date">
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{$post->created_at->format('m/d/Y')}}
                                        </span>
                                    </li>
                                    
                                </ul>
                                <p style="font-size: 18px;">{{$post->body}}</p>
                                <div class="makali-btn transparent-btn grey-border">
                                    <a 
                                    href="{{route('details', $post->slug)}}">إقراء  المزيد</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Single Blog End -->
                       @endforeach
                    </div>
                    <!-- Blog Activation End -->
                    <div class="section-title">
                    </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Blog Area End Here -->
        <!-- Testmonial Start Here -->
        <div class="testmonial bg-image-5 ptb-90">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center cl-testmonial">
                    <h2>أخر  الأخبار</h2>
                    
                </div>
                <!-- Section Title End -->
                <div class="testmonial-active owl-carousel">
                    <!-- Single Slide Testmonial Start -->
                    @foreach($news as $new)
                    <div class="single-testmonial text-center">
                        <div class="testmonial-content">
                            <h4 style="color: #ffffff;">{{ $new->title }}</h4>
                            <p>{{$new->new}}</p>
                            <img style="height: 110px; border-radius:5px; " src="{{asset('public/pictures/new/'. $new->img)}}" alt="testmonial-img">
                            <span class="t-author">{{$new->created_at->format('m/d/Y')}}</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- Single Slide Testmonial End -->
                    
                </div>
            </div>
        </div>
        <!-- Testmonial End Here -->
        
        
       
@endsection