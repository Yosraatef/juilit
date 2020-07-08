@extends('site/app')
@include('site/layouts/header')
@section('main_content')
        <!-- Breadcrumb Area End Here -->
        <!-- Blog Area Start Here -->
        <div class="blog-area pt-90 pb-90">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <h2>نتائج البحث </h2>
                    
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
                                        <p>17</p>
                                        <span>dec</span>
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
                                    <a href="{{route('details', $post->slug)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                       
                        <!-- Single Blog End -->
                    </div>
                    @endforeach
            </div>
            <!-- Container End -->
        
     
       @endsection