@include('front.includes.header')



@include('back.includes.message')


<div class="container-fluid pl-5 pr-5 pb-5">
    <div class="row ">
        <div class="col-md-8 mx-auto mt-5">
        <span>Welcome to {{config('app.name')}}! Please login.</span> <span style="float: right; font-size:12px;"> New member? <a href="{{route('registerpage')}}"> Register here.</a></span>
        </div>
    </div>
    <div class="row mt-5" style="top:50% !important; left:50%!important">
   

        <div class="col-md-8 mx-auto card z-depth-0 rounded-0" style="border:1px solid gray">
        {{Form::open(['method'=>'post','action'=>'Auth\LoginController@login','class'=>'register-form outer-top-xs','role'=>'form'])}}
        <div class="row p-3">
                 <div class="col-lg-7">
                 
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control rounded-0" name="email" required>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control rounded-0" name="password" required>
              </div>
              <span style="float:right; font-size:12px;">
              <a href="#" style="font-size:12px;" type="button" class="btn btn-link pull-right rounded-0" data-toggle="modal" data-target="#forgetpassword">
  Forget password ??
</a>
            </span>
              <button class="btn btn-default pl-5 pr-5  rounded-0" style="background-color:#002f34 !important;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;LOGIN&nbsp; &nbsp; &nbsp; &nbsp;</button>
                 
              
                 </div>
                 <div class="col-lg-5 col-md-5">
                
                 <p>or login with</p>
                 <a href="#" class="btn btn-default pl-5 pr-5  rounded-0" style="background-color:#3b5998 !important;">&nbsp; &nbsp; &nbsp;<i class="fab fa-facebook-f "></i> &nbsp;&nbsp;&nbsp;  FACEBOOK  &nbsp; &nbsp;</a>
                 <a href="#" class="btn btn-default pl-5 pr-5  rounded-0" style="background-color: #d34836 !important;">&nbsp; &nbsp;&nbsp; &nbsp; <i class="fab fa-google"></i> &nbsp;&nbsp;&nbsp;GOOGLE&nbsp; &nbsp; &nbsp; &nbsp;</a><br>
                 <span class="" style="font-size:13px;">
                 <a href="#" type="button" style="font-size:13px;" class="btn btn-link pull-right rounded-0 p-0" data-toggle="modal" data-target="#verification">
  Resend verification email ??
</a>
                </span>
                </div>
             </div>
             {{Form::close()}}
        </div>
    </div>
</div>



{{--
<div class="container" style="margin-top:30px;">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in" style="border-right: 2px solid black">
    <h4 class="">Sign in</h4>
    <p class="">Hello, Welcome to your account.</p>
    <div class="social-sign-in outer-top-xs">
        <a href="{{ url('/login/facebook') }}" class="facebook-sign-in btn btn-primary" style="border-radius:0px;"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="{{ url('/login/google') }}" class="twitter-sign-in btn btn-danger" style="border-radius:0px;"><i class="fa fa-google"></i> Sign In with Google</a>
    </div>
    {{Form::open(['method'=>'post','action'=>'Auth\LoginController@login','class'=>'register-form outer-top-xs','role'=>'form'])}}
  
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required="">
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" required="" >
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="remember" id="optionsRadios2" value="option2">Remember me!
            </label>
           <a href="#" type="button" class="btn btn-primary pull-right rounded-0" data-toggle="modal" data-target="#forgetpassword">
  Forget password ??
</a>
<a href="#" type="button" class="btn btn-danger pull-right rounded-0" data-toggle="modal" data-target="#verification">
  Resend verification email ??
</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="border-radius: 0px;">Login</button>
   {{Form::close()}}                
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>
   {{Form::open(['method'=>'post','action'=>'Auth\RegisterController@register','class'=>'register-form outer-top-xs','role'=>'form'])}}
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
            <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="number" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
        </div>
        
            <div class="form-group">
            <label for="exampleFormControlSelect1">Account Type</label>
            <select class="form-control rounded-0" id="exampleFormControlSelect1" name="acc_type">
              <option>Buyer</option>
              <option>Seller</option>
            </select>
          </div>
        
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password"  >
            <input type="checkbox" onclick="myPassword()">Show Password
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="passwords" >
            <input type="checkbox" onclick="myPasswords()">Show Password
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="border-radius:0px;">Sign Up</button>
   {{Form::close()}}
    
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

        <div class="logo-slider-inner"> 
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item m-t-10">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->
            </div><!-- /.owl-carousel #logo-slider -->
        </div><!-- /.logo-slider-inner -->
    
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
--}}

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="forgetpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-0">
   
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset('/images/profile.png')}}" height="150">
            </div>
            <div class="col-lg-8">
                <h3>Enter Your Email Address</h3>
                {{Form::open(['route'=>'password.recovery','method'=>'post'])}}
                <input type="email" name="email" class="form-control rounded-0" required>
                <button type="submit" class="btn btn-info rounded-0 mt-2 p-2" style="background-color:#002f34 !important;">Submit</button>
                {{Form::close()}}
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<div class="modal fade" id="verification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-0">
   
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset('/images/profile.png')}}" height="150">
            </div>
            <div class="col-lg-8">
                <h3>Enter Your Email Address</h3>
                <p> Check email for verification link</p>
                {{Form::open(['route'=>'email.verification','method'=>'post'])}}
                <input type="email" name="email" class="form-control rounded-0" required>
                <input type="hidden" name="verification" value="1">
                <button type="submit" style="background-color: #002f34 !important;" class="btn btn-info rounded-0 mt-2 p-2">Submit</button>
                {{Form::close()}}
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


@include('front.includes.footer')
<script>
    function myPassword() {
        console.log('login');
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
    function myPasswords() {
  var x = document.getElementById("passwords");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>