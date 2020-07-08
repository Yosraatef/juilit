@extends('site/app')
 @section('header')
 <header class="header-style-five">
           
             <!-- Header Middle Start Here -->
            <div class="header-middle stick header-sticky">
                <div class="header-middle_nav position-relative">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo Start -->
                            <div class="col-xl-3 col-lg-2 col-6">
                                <div class="logo">
                                    <a href="{{route('home')}}">
                                        <img style="height:50px;" src="{{asset('public/site/img/logo/logo.png')}}" alt="logo-image">
                                    </a>
                                </div>
                            </div>
                            <!-- Logo End -->
                            <!-- Menu Area Start Here -->
                            <div class="col-xl-7 col-lg-8 d-none d-lg-block position-static">
                                <nav>
                                    <ul class="header-bottom-list d-flex justify-content-start">
                                        <li class="active position-static">
                                            <a style="font-size:18px;" href="{{route('home')}}">الرئسية</a>
                                            
                                        </li>
                                        @foreach($allSection as $section)
                                        <li>
                                            <a style="font-size:18px;" href="{{route('section', $section->id)}}">{{$section->name}}</a>
                                            
                                        </li>
                                        @endforeach
                                       
                                    </ul>
                                </nav>
                            </div>
                            <!-- Menu Area End Here -->
                           
                        </div>
                        <!-- Row End -->
                       
      
         
        <!-- Breadcrumb Area End Here -->
        </header>
    @endsection
@section('main_content')
 
          <div class="breadcrumb-area">
            <div class="container">
                <ol class="breadcrumb breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active">{{$sections->name}}</li>
                    
                </ol>
            </div>
        </div>
        <!-- Blog Area Start Here -->
        <div class="blog-area pt-90 pb-90">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <h2> {{$sections->name}} </h2>
                    
                </div>
                <!-- Section Title End -->
                <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-40">
                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="blog-details.htmll">
                                     <img style="width:363px;height: 248px;" 
                            src="{{asset('public/pictures/post/'.$post->img) }}">
                                </a>
                                <div class="entry-meta">
                                    <div class="date">
                                        <p>{{$post->view_count}}</p>
                                        <span>مشاهدة</span>
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
                                <p>{{$post->body}}</p>
                                <div class="makali-btn transparent-btn grey-border">
                                    <a href="{{route('details', $post->slug)}}">اقرأ المزيد</a>
                                </div>
                            </div>
                        </div>
                       
                        <!-- Single Blog End -->
                    </div>
                    @endforeach
            </div>
            <!-- Container End -->
        
     
       @endsection
    