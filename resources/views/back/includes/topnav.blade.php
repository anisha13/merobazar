<div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                   @if(!empty(auth()->user()->image))
                                <img src="{{asset('images/'.auth()->user()->image)}}" alt="">
                                 @else
                                 <img src="{{asset('images/profile.png')}}" alt="">
                                 @endif
                                 {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="{{route('admin.editprofile')}}"> </a> -->
                                    
                                    <a class="dropdown-item" href="{{route('admin.changepassword')}}">Profile</a>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right_col" role="main">

            @include('back.includes.message')