<?php 
    $role = App\Role::where('slug',auth()->user()->roles)->first();
    if(!empty($role))
{
     $permissions =App\Rolepermission::where('role_id',$role->id)->get();
}
else{
    $permissions=[];
}
?>
<body class="nav-md footer_fixed">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{route('admin.home')}}" class="site_title text-center"> <span>{{config('app.name')}}</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if(!empty(auth()->user()->image))
                            <img src="{{asset('images/'.auth()->user()->image)}}" alt="..." class="img-circle profile_img">
                            @else
                            <img src="{{asset('images/profile.png')}}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{auth()->user()->name}}</h2>
                        </div>
                    </div>

                    <br />
                    
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
                        <div class="menu_section">
                            <h3>Dashboard</h3>
                            <ul class="nav side-menu">
                                
                            @foreach($permissions as $permission)
                          
                            @if($permission->permissiontitle == "Admin")
                            <li><a href="{{route('admins.index')}}"><i class="fa fa-laptop"></i> Admin </a></li>
                            @elseif($permission->permissiontitle == "Menu")
                                <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    @foreach($permissions as $permission)
                                    @if($permission->permissiontitle == "Category")
                                        <li><a href="{{route('category.index')}}">Category</a></li>
                                        @elseif($permission->permissiontitle == "Product Category")
                                        <li><a href="{{route('catalog.brand')}}">Product Category</a></li>
                                        @endif
                                       @endforeach 
                                    </ul>
                                </li>
                                @elseif($permission->permissiontitle == "Products")
                                <li><a><i class="fa fa-edit"></i>Products  <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    @foreach($permissions as $permission)
                                    @if($permission->permissiontitle == "Product/View")
                                        <li><a href="{{route('product.index')}}">Product/View</a></li>
                                        @endif
                                       @endforeach  
                                    </ul>
                                </li>
                                @elseif($permission->permissiontitle == "General Setting")
                                <li><a><i class="fa fa-desktop"></i> General Setting <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    @foreach($permissions as $permission)
                                    @if($permission->permissiontitle == "Slider")
                                        <li><a href="{{route('slider')}}">Slider</a></li>
                                        @elseif($permission->permissiontitle == "Adds")
                                       
                                        <li><a href="{{route('ads')}}">Adds</a></li>
                                        @elseif($permission->permissiontitle == "Company Details")
                                        <li><a href="{{route('company.index')}}">Company Details</a></li>
                                        @elseif($permission->permissiontitle == "Social Media")
                                        <li><a href="{{route('socialmedia')}}">Social Media</a></li>
                                       @endif
                                       @endforeach
                                    </ul>
                                </li>
                                @elseif($permission->permissiontitle == "Message")
                                <li><a href="{{route('admin.question')}}"><i class="fa fa-laptop"></i> Message </a></li>
                                @elseif($permission->permissiontitle == "User")
                                <li><a href="{{route('admin.users')}}"><i class="fa fa-laptop"></i> User </a></li>
                                @endif
                                
                                @if($permission->permissiontitle == "All")
                                <li><a href="{{route('admins.index')}}"><i class="fa fa-laptop"></i> Admin </a></li>
                                <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('category.index')}}">Category</a></li>
                                        <li><a href="{{route('catalog.brand')}}">Product Category</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Products  <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('product.index')}}">Product/View</a></li>
                                       
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> General Setting <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('slider')}}">Slider</a></li>
                                        <li><a href="{{route('ads')}}">Ads</a></li>
                                        <li><a href="{{route('company.index')}}">Company Details</a></li>
                                        <li><a href="{{route('socialmedia')}}">Social Media</a></li>
                                     
                                    </ul>
                                </li>
                                <li><a href="{{route('admin.question')}}"><i class="fa fa-laptop"></i> Message </a></li>
                                <li><a href="{{route('admin.users')}}"><i class="fa fa-laptop"></i> User </a></li>

                                @endif
                                
                                @endforeach



                                <!-- <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                    </ul>
                                </li>  -->
                            </ul>
                        </div>
                        <!-- <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="e_commerce.html">E-commerce</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li><a href="project_detail.html">Project Detail</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="page_403.html">403 Error</a></li>
                                        <li><a href="page_404.html">404 Error</a></li>
                                        <li><a href="page_500.html">500 Error</a></li>
                                        <li><a href="plain_page.html">Plain Page</a></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#level1_1">Level One</a>
                                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li class="sub_menu"><a href="level2.html">Level Two</a>
                                                </li>
                                                <li><a href="#level2_1">Level Two</a>
                                                </li>
                                                <li><a href="#level2_2">Level Two</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#level1_2">Level One</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                            </ul>
                        </div> -->
                    </div>
                   

                 


                   

                </div>
            </div>