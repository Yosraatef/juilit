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
                                            <a style="font-size:18px;" href="#{{$section->name}}">{{$section->name}}</a>
                                            
                                        </li>
                                        @endforeach
                                       
                                    </ul>
                                </nav>
                            </div>
                            <!-- Menu Area End Here -->
                           
                        </div>
                        <!-- Row End -->
                       
        </header>