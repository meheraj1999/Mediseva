<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="{{ route('admin') }}">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">Medi</span><span class="font-size-xl text-primary">seva</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn" >
                <img class="img-avatar img-avatar32" style="width: 128px;
    height: 84px;"  src="{{ asset('assets/front-end/img/logo.png')}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="{{ route('admin') }}">
                    <img class="img-avatar img-avatar32" style="width: 128px;
    height: 84px;" src="{{ asset('assets/front-end/img/logo.png')}}" alt="">
                </a>
             
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="active" href="{{ route('admin') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
               
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Admin Feature</span></li>
                <li class="{{ Request::is('admin/slider') ? 'open' : '' }} {{ Request::is('admin/slider/create') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="{{ route('slider.home') }}"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Slider</span></a>
                    <ul>
                        <li>
                            <a class="{{ Request::is('admin/slider') ? 'active' : '' }}" href="{{ route('slider.home') }}">List</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/slider/create') ? 'active' : '' }}" href="{{ route('slider.create') }}">Add new</a>
                        </li>
                  
                    </ul>
                </li>
               
                <li>
           
                {{-- <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Service</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('service.create') }}.html">Add New</a>
                        </li>
                        <li>
                            <a href="{{ route('service.home') }}">List</a>
                        </li>
                        
                    </ul>
                </li> --}}
                <li class="{{ Request::is('admin/doctor') ? 'open' : '' }} {{ Request::is('admin/doctor/create') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-image"></i><span class="sidebar-mini-hide">Doctor</span></a>
                    <ul>
                        <li>
                            <a class="{{ Request::is('admin/doctor/create') ? 'active' : '' }}" href="{{ route('doctor.create') }}">Add New</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/doctor') ? 'active' : '' }}" href="{{ route('doctor.home') }}">List</a>
                        </li>
                        
                    </ul>
                </li>

              
          <li class="{{ Request::is('admin/hospital') ? 'open' : '' }} {{ Request::is('admin/hospital/create') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-image"></i><span class="sidebar-mini-hide">hospital</span></a>
                    <ul>
                        <li>
                            <a class="{{ Request::is('admin/hospital/create') ? 'active' : '' }}" href="{{ route('hospital.create') }}">Add New</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/hospital') ? 'active' : '' }}" href="{{ route('hospital.home') }}">List</a>
                        </li>
                        
                    </ul>
                </li>
                </li>
          <li class="{{ Request::is('admin/depertment') ? 'open' : '' }} {{ Request::is('admin/depertment/create') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-image"></i><span class="sidebar-mini-hide">depertment</span></a>
                    <ul>
                        <li>
                            <a class="{{ Request::is('admin/depertment/create') ? 'active' : '' }}" href="{{ route('depertment.create') }}">Add New</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/depertment') ? 'active' : '' }}" href="{{ route('depertment.home') }}">List</a>
                        </li>
                        
                    </ul>
                </li>

                <li class="{{ Request::is('admin/service') ? 'open' : '' }} {{ Request::is('admin/service/create') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-image"></i><span class="sidebar-mini-hide">service</span></a>
                    <ul>
                        <li>
                            <a class="{{ Request::is('admin/service/create') ? 'active' : '' }}" href="{{ route('service.create') }}">Add New</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/service') ? 'active' : '' }}" href="{{ route('service.home') }}">List</a>
                        </li>
                        
                    </ul>
                </li>

                <!-- <li class="{{ Request::is('admin/members/create') ? 'open' : '' }} {{ Request::is('admin/members/list/0') ? 'open' : '' }} {{ Request::is('admin/members/list/1') ? 'open' : '' }} {{ Request::is('admin/members/list/2') ? 'open' : '' }} {{ Request::is('admin/members/list/3') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Member</span></a>
                    <ul>
                       
                        <li>
                            <a class="{{ Request::is('admin/members/create') ? 'active' : '' }}" href="{{ route('members.create') }}">Add Member</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/members/list/0') ? 'active' : '' }}"  href="{{ route('members.home',[0]) }}">Ec Committee</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/members/list/1') ? 'active' : '' }}" href="{{ route('members.home',[1]) }}">Honor Board</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/members/list/2') ? 'active' : '' }}" href="{{ route('members.home',[2]) }}">Member</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/members/list/3') ? 'active' : '' }}" href="{{ route('members.home',[3]) }}">Donor</a>
                        </li>
                      
                    </ul>
                </li> -->
                <li>
                    <a class="nav-submenu"  href="{{ route('message.list') }}"><i class="fa fa-inbox"></i><span class="sidebar-mini-hide">Messages</span></a>
                   
                </li>
                <!-- <li>
                    <a class="nav-submenu"  href="{{ route('setting.video') }}"><i class="fa fa-youtube"></i><span class="sidebar-mini-hide">Home Video</span></a>
                   
                </li> -->
                <li class="nav-main-heading"><span class="sidebar-mini-visible"></span><span class="sidebar-mini-hidden">Setting</span></li>
                {{-- <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-vector"></i><span class="sidebar-mini-hide">Layout</span></a>
                    <ul>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">General</a>
                            <ul>
                                <li>
                                    <a href="be_layout_default.html">Default</a>
                                </li>
                                <li>
                                    <a href="be_layout_flipped.html">Flipped</a>
                                </li>
                                <li>
                                    <a href="be_layout_native_scrolling.html">Native Scrolling</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Header</a>
                            <ul>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Static</a>
                                    <ul>
                                        <li>
                                            <a href="be_layout_header_modern.html">Modern</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_classic.html">Classic</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_classic_inverse.html">Classic Inverse</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_glass.html">Glass</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_glass_inverse.html">Glass Inverse</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Fixed</a>
                                    <ul>
                                        <li>
                                            <a href="be_layout_header_fixed_modern.html">Modern</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_fixed_classic.html">Classic</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_fixed_classic_inverse.html">Classic Inverse</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_fixed_glass.html">Glass</a>
                                        </li>
                                        <li>
                                            <a href="be_layout_header_fixed_glass_inverse.html">Glass Inverse</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sidebar</a>
                            <ul>
                                <li>
                                    <a href="be_layout_sidebar_inverse.html">Inverse</a>
                                </li>
                                <li>
                                    <a href="be_layout_sidebar_hidden.html">Hidden</a>
                                </li>
                                <li>
                                    <a href="be_layout_sidebar_mini.html">Mini</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Side Overlay</a>
                            <ul>
                                <li>
                                    <a href="be_layout_side_overlay_visible.html">Visible</a>
                                </li>
                                <li>
                                    <a href="be_layout_side_overlay_hoverable.html">Hoverable</a>
                                </li>
                                <li>
                                    <a href="be_layout_side_overlay_no_page_overlay.html">No Page Overlay</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Main Content</a>
                            <ul>
                                <li>
                                    <a href="be_layout_content_boxed.html">Boxed</a>
                                </li>
                                <li>
                                    <a href="be_layout_content_narrow.html">Narrow</a>
                                </li>
                                <li>
                                    <a href="be_layout_content_full_width.html">Full Width</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Hero</a>
                            <ul>
                                <li>
                                    <a href="be_layout_hero_color.html">Color</a>
                                </li>
                                <li>
                                    <a href="be_layout_hero_bubbles.html">Bubbles</a>
                                </li>
                                <li>
                                    <a href="be_layout_hero_image.html">Image</a>
                                </li>
                                <li>
                                    <a href="be_layout_hero_video.html">Video</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="be_layout_api.html">API</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="{{ Request::is('admin/view') ? 'open' : '' }} {{ Request::is('admin/setting/about-us') ? 'open' : '' }}{{ Request::is('admin/setting/our-vision') ? 'open' : '' }}{{ Request::is('admin/social') ? 'open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">App setting</span></a>
                    <ul>
                       
                    
                        <li>
                            <a class="{{ Request::is('admin/view') ? 'active' : '' }}" href="{{ route('setting.index') }}">Web setting</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/setting/about-us') ? 'active' : '' }}" href="{{ route('setting.about') }}">About Us</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/setting/our-vision') ? 'active' : '' }}" href="{{ route('setting.vision') }}">Notice</a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/social') ? 'active' : '' }}" href="{{ route('setting.social') }}">Social Link</a>
                        </li>
                    </ul>
                </li>
              
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->