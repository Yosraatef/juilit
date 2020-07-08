<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('public/admin/images/favicon.ico')}}"
                 alt="Al Badr"
                 title="Al Badr"
                 class="rounded-circle img-thumbnail avatar-lg"></a>
            <div class="dropdown">
                <a href="{{route('dashboard')}}"
                   class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-toggle="dropdown"></a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>

        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">الاقسام</li>



                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-theater"></i>
                        <span> الرئيسية </span>
                        
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users') }}">
                        <i class="mdi mdi-theater"></i>
                        <span> المستخدمين </span>
                        
                    </a>
                </li>


               
                <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span>الأقسام</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('section.index')}}"><i class="mdi mdi-eye"></i>
                        كل  الاقسام</a></li>
                    <li><a href="{{route('section.create')}}"><i class="mdi mdi-table-edit"></i>
                     اضافة قسم</a></li>
                  </ul>
                </li>
               <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span>كلمات ذات صلة</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('tag.index')}}"><i class="mdi mdi-eye"></i>
                        كل  الكلمات ذات الضلة</a></li>
                    <li><a href="{{route('tag.create')}}"><i class="mdi mdi-table-edit"></i>
                     اضافة  كلمة  ذات   صلة</a></li>
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span>المواضيع</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('post.index')}}"><i class="mdi mdi-eye"></i>
                        كل المواضيع</a></li>
                    <li><a href="{{route('post.create')}}"><i class="mdi mdi-table-edit"></i>
                  اضافة موضوع</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span>صور الموضوع</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('image.index')}}"><i class="mdi mdi-eye"></i>
                        كل  الصور </a></li>
                    <li><a href="{{route('image.create')}}"><i class="mdi mdi-table-edit"></i>
                  اضافة صورة</a></li>
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span> اخر الأخبار</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('new.index')}}"><i class="mdi mdi-eye"></i>
                        كل الأخبار</a></li>
                    <li><a href="{{route('new.create')}}"><i class="mdi mdi-table-edit"></i>
                  اضافة  الخبر</a></li>
                  </ul>
                </li>
                 <li class="treeview">
                  <a href="#">
                    <i class="mdi mdi-theater"></i> <span> البنارات</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{route('banner.index')}}"><i class="mdi mdi-eye"></i>
                       كل البنارات </a></li>
                    <li><a href="{{route('banner.create')}}"><i class="mdi mdi-table-edit"></i>
                  اضافة بانر</a></li>
                  </ul>
                </li>
                 <li>
                    <a href="{{route('settings.create')}}">
                        <i class="mdi mdi-theater"></i>
                        <span> الاعدادت </span>
                        
                    </a>
                </li>
                

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->