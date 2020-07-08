@extends('site/app')

@section('main_content')
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
                                        @foreach($sections as $section)
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
                       
        </header>
        <div class="breadcrumb-area">
            <div class="container">
                <ol class="breadcrumb breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item ">{{$detailspost->section->name}}</li>
                    <li class="breadcrumb-item active">{{$detailspost->title}}</li>
                </ol>
            </div>
        </div>
    <!-- Blog Details Area Start -->
        <div class="blog-details-area white-bg ptb-90">
            <div class="container">
                <div class="row">
                    
                    <!-- Blog Details Start -->
                    <div class="col-xl-9 col-lg-8">
                        <div class="blog-details mb-all-40">
                            <div class="blog-hero-img mb-40">
                                <img style="height:350px;" class="full-img"  src="{{asset('public/pictures/post/'.$detailspost->img) }}" alt="blog-details">
                                <div class="entry-meta">
                                    <div class="date">
                                        <p>{{$detailspost->view_count}}</p>
                                        <span>مشاهدة</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="text-upper-portion">
                                <h3 class="blog-dtl-header portfolio-header">{{$detailspost->title}}</h3>
                                <ul class="meta-box meta-blog d-flex">
                                    <li class="meta-date"><span><i class="fa fa-calendar" aria-hidden="true"></i>
                                         {{$detailspost->created_at->format('m/d/Y')}}
                                    </span></li>
                                </ul>

                                <p class="mb-20">
                                    {{$detailspost->body}}
                                </p>
                                
                               
                            </div>
                             <div class="row align-items-center ptb-40">
                               @foreach( $images as $img)
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-xsm-30">
                                    <img class="full-img" src="{{asset('public/pictures/images/'.$img->image ) }}" alt="blog-img">
                                </div>
                                @endforeach
                               
                            </div>
                            <div class="text-lower-portion">
                                <p>
                                    {!! $detailspost->text !!}

                                </p>
                                
                            </div>
                            </br>
                            </br>
                            </br>
                            <div class="tags-social d-md-flex justify-content-sm-between ">
                                <div class="tags">
                                    <ul class="d-flex">
                                        <li class="t-list" style="font-weight: bold" >كلمات ذات صلة بالمقال :</li>
                                        
                                        @foreach( $detailspost->tag as $tg)
                                        <li><a href="#">{{$tg->name}},</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <div class="blog-social">
                                    <ul class="d-flex">
                                        <li class="t-list" style="font-weight: bold">مشاركة:</li>
                                       
                
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
            
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-pagination">
                               <ul class="pagination">
                                    @if($previous)
                                    <li><a href="{{route('details', $previous->slug)}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>السابق </a>
                                    </li>
                                    @endif
                                    
                                    @if($next)
                                    <li class="ml-auto"><a href="{{route('details', $next->slug)}}">التالي <i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            
                            <!-- Comment Area Start -->
                            <div class="comments-area ptb-90">
                            @if(isset($comments))
                                <h3 class="sidebar-header">تعليقات</h3>
                             
                                 @endif
                                <!-- Single Comment Start -->
                                <div >
                                   @foreach($comments as $comment )
                                    <div class="comment-desc">
                                        <div class="comment-upper d-flex justify-content-between align-items-center">
                                            <div class="comment-title">
                                                <h6><a href="#">{{$comment->name}}</a></h6>
                                                <span>{{$comment->created_at->format('m/d/Y')}}</span>
                                            </div>
                                            
                                        </div>
                                        <p>{{$comment->comment}}</p>
                                        <br>
                                    </div>
                                   
                                    @endforeach
                                </div>
                                <!-- Single Comment End -->
                                
                               
                            </div>
                           
                            <!-- Comment Area End -->
                            <!-- Blog Deatils Contact Start -->
                            <div class="blog-detail-contact">
                                <h3 class="mb-45 sidebar-header contact-header">اترك تعليقك</h3>
                                <div class="submit-review">
                                    <form class="row"  action="{{route('comment' , $detailspost->slug)}}" method="post">
                                    {{ csrf_field()}}
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" name="name" placeholder="ادخل الاسم " type="text">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" name="email" placeholder="ادخل الايميل" type="email">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <textarea class="form-control" name="comment" placeholder="اترك تعليقك "></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <input value="ارسل تعليقك" class="login-btn" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Blog Deatils Contact End -->
                            <!-- Blog Deatils Contact End -->
                        </div>
                    </div>
                    <!-- Blog Details End -->
                    <!-- Blog Sidebar Start -->
                     <!-- Blog Sidebar Start -->
                    <div class="col-xl-3 col-lg-4">
                        <div class="blog-sidebar right-sidebar mt-all-80">
                            <!-- Search Box Start -->
                            <div class="newsletter-box blog-details-box mb-40">
                                <h3 class="sidebar-header">ابحث باسم المقالة </h3>
                                <form action="{{route('search')}}" metod="POST">
                                    <input class="subscribe search" placeholder="ادخل عنوان المقاله " name="search" type="text">
                                    <button type="submit" class="submit">ابحث</button>
                                </form>
                            </div>
                            <!-- Search Box End -->
                            <!-- Category Post Start -->
                            <div class="categorie recent-post mb-60">
                                <h3 class="sidebar-header">الأقسام </h3>
                                <ul class="categorie-list">
                                    @foreach($sections as $section)
                                    <li><a href="#"> {{$section->name}} <span>{{$section->posts->count()}} </span></a></li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                            <!-- Category Post End -->
                            <!-- Recent Post Start -->
                            <div class="recent-post mb-60">
                                <h3 class="sidebar-header">اخر المقالات</h3>
                                <div class="all-recent-post">
                                   @foreach($postsSection as $postSec)
                                    <div class="single-recent-post">
                                        <div class="recent-img">
                                            <a href="{{route('details', $postSec->slug)}}"><img src="{{asset('public/pictures/post/'. $postSec->img) }}" alt="blog-img"></a>
                                        </div>
                                        <div class="recent-desc">
                                            <h6><a href="{{route('details', $postSec->slug)}}">{{$postSec->title}}</a></h6>
                                            <span>{{$postSec->created_at->format('m/d/Y')}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                            <!-- Recent Post End -->
                            <!-- Meta Post Start -->
                            
                            <div class="categorie recent-post">
                                <h3 class="sidebar-header">كلمات ذات صلة</h3>
                                <ul class="tag-list d-flex flex-wrap">
                                    @foreach($tags as $tag)                            
                                    <li><a href="#">{{$tag->name}}</a></li>
                                @endforeach
                                </ul>
                            </div>
                            <!-- Meta Post End -->
                        </div>
                    </div>
                    <!-- Blog Sidebar End -->
                    <!-- Blog Sidebar End -->
                </div>
            </div>
        </div>
        <!-- Blog Details Area End -->
@endsection
@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e396fa9e8d2f986"></script>

@endsection