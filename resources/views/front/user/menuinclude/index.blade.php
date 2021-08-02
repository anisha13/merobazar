<style>
    .nav li a {
        color: white !important;
    }
</style>
<nav class="container-fluid sitecolor" style="background-color:#94A7A8 !important;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @if(!empty(auth()->user()->image))
            <img src="{{asset('images/'.auth()->user()->image)}}" height="150" class="d-block mx-auto" style="border-radius:50%">
            @else
            <img src="{{asset('images/profile.png')}}" height="150" class="d-block mx-auto">
            @endif
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div> -->
</nav>

<div class="container-fluid pl-5 pr-5">
    <!-- Grid row -->
<div class="row py-4">

<div class="col-md-3 col-lg-2 col-sm-12 col-12 card z-depth-0" style="">

  <!-- <nav class="nav flex-column   font-weight-bold">
    <a class="nav-link active" href="#">Dashboard</a>
    <a class="nav-link" href="#">Profile</a>
    <a class="nav-link" href="#">Wishlist</a>
    <a class="nav-link " href="#">Products</a>
  </nav> -->
  <a href="{{route('front.user')}}" class="btn btn-outline-unique waves-effect" style="border:2px solid #002f34 !important; color:#002f34 !important;">Dashboard</a>
  <a href="{{route('manageprofile')}}" class="btn btn-outline-unique waves-effect" style="border:2px solid #002f34 !important; color:#002f34 !important;">Profile</a>
  <a href="{{route('mywishlist')}}" class="btn btn-outline-unique waves-effect" style="border:2px solid #002f34 !important; color:#002f34 !important;">Wishlist</a>
  
  @if(auth()->user()->acc_type == "seller")
  <a href="{{route('myproduct')}}" class="btn btn-outline-unique waves-effect" style="border:2px solid #002f34 !important; color:#002f34 !important;">Product</a>
  <a href="{{route('seller.message')}}" class="btn btn-outline-unique waves-effect" style="border:2px solid #002f34 !important; color:#002f34 !important;">Message</a>
  @endif
  
  

</div>
