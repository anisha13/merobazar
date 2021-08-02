<?php
$company = App\Companydetail::orderBy('created_at', 'desc')->first();
$categories = App\Category::where('parent_id','0')->where('status', '1')->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<base href="{{route('home')}}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{config('app.name')}}</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('front/css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link rel="stylesheet" href="{{asset('front/css/owl.css')}}">
</head>
<style>
  .nav-item a {
    color: black !important;
  }
</style>

<body>

  <nav class="navs navbar-expand-lg navbar-light sticky-top nav1 sitecolor" style="background: linear-gradient(59deg, #3A6073, #16222A);" >
    <div class="container-fluid pl-5 pr-5">
      <div class="row pt-2">
        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
          @if(!empty($company->logo))
          <a href="{{route('home')}}">
            <img src="{{asset('images/'.$company->logo)}}" height="50">
          </a>
          @else
          @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        {{Form::open(['method'=>'get','route'=>'search','class'=>['search-header']])}}
          <div class="input-group md-form  form-2 pl-0 rounded-0" style="margin-top: 0 !important; margin-bottom:0 !important;">
            <input class="form-control my-0 py-2 red-border " name="q" type="text" style="border:2px solid black; background-color:white; " placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="input-group-text " style="border:2px solid black; color:white; background-color:black;" id="basic-text1" type="submit"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
              <!-- <span class="input-group-text   rounded-0" style="border:2px solid black; color:white;" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>
                     -->
            </div>
          </div>
          {{Form::close()}}
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-3" style="margin-top: 0!important;margin-bottom: 0!important;">
          <div class="row">
            <div class="col">
              <!-- Basic dropdown -->
              <button class="btn btn-link " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-10px !important; margin-bottom:0 !important; text-decoration:none;">
                <span style="display: flex;">
                @if(empty(auth()->user()->image))
                 <img src="{{asset('images/profile.png')}}" height="40"> 
                 @else
                 <img src="{{asset('images/'.auth()->user()->image)}}" height="40" style="border-radius:50%;"> 
                 @endif
                 <i class="fa fa-angle-down pt-3"></i> </span>
              </button>

              <div class="dropdown-menu" style="z-index: 999;">
                @if(!empty(auth()->user()))
                <a class="dropdown-item pb-2 pt-2" href="{{route('front.user')}}" style="color:black">{{auth()->user()->name}}</a>
                
                @endif
                @if(!empty(auth()->user()))
                <div class="dropdown-divider text-center"></div>
                {{Form::open(['class'=>'ml-auto','methood'=>'post','route'=>'logout'])}}
                <button class="btn btn-link p-0 ml-5" type="submit" style="text-decoration:none;"> Log Out</button>
                {{Form::close()}}
                @endif
              </div>
              <!-- Basic dropdown -->
            </div>
            <div class="col pt-1 pl-5">
              @if(!empty(auth()->user()))
              @php($wishlist =App\Wishlist::where('user_id',auth()->user()->id)->count())
              @endif
              <a href="{{route('mywishlist')}}">

                <img src="{{asset('images/dill.png')}}" height="35" class="">
                <p class="badge badge-danger" style="z-index: 9999px; position:absolute; margin-top:-2px !important;">
                  @if(!empty(auth()->user()))
                  {{$wishlist}}
                  @else
                  0
                  @endif
                </p>
              </a>
            </div>

            <div class="col" style="margin-top:0px !important;">
              <a href="{{route('front.user')}}" class="btn btn-outline-default btn-sm pt-1 pb-1 pl-4 pr-4" style="color:white !important; border-radius:30px; font-size:13px;"> Sell</a>
              <!-- <img src="{{asset('images/sell.png')}}" height="60"> -->

            </div>
          </div>
        </div>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_nav" aria-controls="mobile_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mobile_nav">

        <ul class="navbar-nav navbar-light mx-auto  " style="margin-top:-20px !important;">

          <!-- <li class="nav-item dmenu dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Services
                  </a>
                  <div class="dropdown-menu sm-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Software Development</a>
                      <a class="dropdown-item" href="#">Web Designing & Development</a>
                      <a class="dropdown-item" href="#">Mobile Application</a>
                      <a class="dropdown-item" href="#">Business Solutions & Business Process</a>
                      <a class="dropdown-item" href="#">Digital Marketing & SEO Services</a>
                      <a class="dropdown-item" href="#">Web Hosting & Maintenance</a>
                      <a class="dropdown-item" href="#">Cyber Security</a>
                      <a class="dropdown-item" href="#">Block Chain Implementation</a>
                      <a class="dropdown-item" href="#">Big Data</a>
                  </div>
              </li> -->

          <!--========-->
          @foreach($categories as $category)
          @if($category->categories->count()=="0")
          <li class="nav-item"><a class="nav-link" href="{{route('product.category',$category->url)}}" style="color:whitesmoke !important;">{{$category->name}}</a></li>
          @else
          <li class="nav-item dropdown megamenu-li dmenu">

            <a class="nav-link dropdown-toggle" href="{{route('product.category',$category->url)}}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:whitesmoke !important;">{{$category->name}}</a>

            <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01">
              <div class="row">
                @foreach($category->categories as $subcat)
                <div class="col-sm-6 col-lg-3 border-right mb-4">
                  <h6><a href="{{route('product.category',$subcat->url)}}">{{$subcat->name}}</h6>
                  @if($subcat->categories->count() != "0")
                  @include('front.includes.subcategory')
                  @endif
                  <!-- <a class="dropdown-item" href="#"><i class="fab fa-magento"></i> Magento Development</a>
                              <a class="dropdown-item" href="#"><i class="fab fa-magento"></i> Magento 2 Migration</a>
                              <a class="dropdown-item" href="#"><i class="fab fa-magento"></i> Odoo ERP</a>
                              <a class="dropdown-item" href="#"><i class="fab fa-magento"></i> Mobile Commerce</a>
                              <a class="dropdown-item" href="#"><i class="fab fa-magento"></i> CRM for Commerce</a> -->
                </div>
                @endforeach

              </div>

            </div>

          </li>
          @endif
          @endforeach




        </ul>
      </div>
    </div>
  </nav>


@include('flash::message')













  <!--/.Navbar -->
  <nav class="pl-4 pr-4 nav2 pb-2 sticky-top sitecolor " style="background: linear-gradient(59deg, #16222A,#3A6073 ) !important; display: none; border-bottom: 2px solid #ef510c; ">
    <div class="row">
      <div class="col-lg-3 col-md-3 ">


        @if(!empty($company->logo))
        <a href="#"><img src="{{asset('images/'.$company->logo)}}" height="50" class="mx-auto d-block "></a>
        @endif
      </div>
      <div class="col-lg-5 col-md-3 text-center pt-2">
      {{Form::open(['method'=>'get','route'=>'search','class'=>['search-header']])}}
        <div class="input-group form-sm form-2 pl-0">
          <input style="border-bottom-left-radius: 30px !important;
            border-top-left-radius: 30px !important;" name="q" class="form-control red-border" type="text" placeholder="Search" required aria-label="Search" />
          <div class="input-group-append">
            <button class="input-group-text red lighten-3" id="basic-text1" type="submit" style="background-color: black !important; color: whitesmoke;border-bottom-right-radius: 30px !important;
                border-top-right-radius: 30px !important;border-radius: 0; line-height:40px;"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
          </div>
        </div>
        {{Form::close()}}
      </div>
      <div class="col-lg-1 col-1"></div>
 
    </div>
  </nav>




  <div class="card rounded-0 pl-3 pr-3 text-center  fixed-bottom sitecolor" style="display:none; background: linear-gradient(59deg, #16222A,#3A6073 ) !important;" id="buttomnav">
    <div class="row p-1">
    <div class="col mt-0" style="margin-top: -15px !important;">
        <a href="{{route('mywishlist')}}" style="margin-left:-30px !important; color:white; text-decoration:none; font-size:15px;" class="btn  btn-link "> <i class="fa fa-heart fa-2x "></i>
          <span class="badge badge-danger headerqty " style="position:absolute; border:50px; margin-top:10px !important; margin-left:-10px !important ">@if(!empty(auth()->user()))
                  {{$wishlist}}
                  @else
                  0
                  @endif</span></span>
        </a>
      </div>
      <div class="col  buttomnavs">
        <a href="{{route('front.user')}}" style="color:white; text-decoration:none;">
          <i class="fa fa-user fa-2x "></i>
        
        </a>
      </div>
      <div class="col buttomnavs">
        <a href="{{route('home')}}" style="color:white; text-decoration:none;">
          <i class="fa fa-home fa-2x"></i>
        </a>
      </div>
      <div class="col buttomnavs">
        <a href="{{route('front.category')}}" style="color:white; text-decoration:none;">
          <i class="fa fa-bars fa-2x "></i>
        </a>
      </div>
      <!-- <div class="col buttomnavs">
        <a href="#" style="color:white; text-decoration:none;">
          <i class="fa fa-sign-out-alt fa-2x "></i>
        </a>
      </div> -->
    </div>
  </div>