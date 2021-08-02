@include('front.includes.header')
@include('back.includes.message')

<div class="container-fluid pl-5 pr-5 pb-5">
    <div class="row ">
        <div class="col-md-8 mx-auto mt-5">
            <span>Welcome to {{config('app.name')}}! Please Register.</span> <span style="float: right; font-size:12px;"> already have account? <a href="{{route('front.user')}}"> Login here.</a></span>
        </div>
    </div>
    <div class="row mt-5 p-5" style="top:50% !important; left:50%!important">


        <div class="col-md-8 mx-auto card z-depth-0 rounded-0" style="border:1px solid gray">
            <h3 class="text-center">Signup</h3>
            <span class="text-center">Get Quick Login with</span>
            <div class="row">
                <div class="col-lg-12 col-12 text-center mx-auto">
                <a href="#" class="btn bnt-default" style="background-color: #3b5998 !important; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp; FACEBOOK &nbsp;&nbsp;&nbsp;&nbsp;</a>
               <a href="#" class="btn bnt-default" style="background-color: #d34836 !important; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fab fa-google"></i>&nbsp;&nbsp;&nbsp;&nbsp;GOOGLE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                     <p>--------------------Or------------------------</p>
            </div>
            </div>

            <div class="container" style="margin-top:30px;">
                <div class="sign-in-page">
                    <div class="row">
                      
                        <div class="col-md-12 col-sm-12 create-new-account">
                          
                            {{Form::open(['method'=>'post','action'=>'Auth\RegisterController@register','class'=>'register-form outer-top-xs','role'=>'form'])}}
                           
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                            </div>
                            <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="number" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                            </div>
                            </div>
                            <div class="row">
                               
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input" id="password">
                                <input type="checkbox" onclick="myPassword()">Show Password
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="passwords">
                                <input type="checkbox" onclick="myPasswords()">Show Password
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Address (please add full address)</label>
                                <textarea class="form-control rounded-0" name="address" placeholder="janpathmarg,Biratnagar,Nepal" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Account Type</label>
                                <select class="form-control rounded-0" id="exampleFormControlSelect1" name="acc_type">
                                    <option>Buyer</option>
                                    <option>Seller</option>
                                </select>
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="background-color:#002f34 !important; border-radius:0px;">Sign Up</button>
                            {{Form::close()}}


                        </div>
                        <!-- create a new account -->
                    </div><!-- /.row -->
                </div><!-- /.sigin-in-->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
               
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </div><!-- /.container -->


            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="forgetpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded-0">
                        <!-- <div class="modal-header rounded-0">
        <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{asset('/images/user.png')}}" height="150">
                                </div>
                                <div class="col-lg-8">
                                    <h3>Enter Your Email Address</h3>
                                    {{Form::open(['route'=>'password.recovery','method'=>'post'])}}
                                    <input type="email" name="email" class="form-control rounded-0">
                                    <button type="submit" class="btn btn-info rounded-0 mt-2">Submit</button>
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
                        <!-- <div class="modal-header rounded-0">
        <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{asset('/images/user.png')}}" height="150">
                                </div>
                                <div class="col-lg-8">
                                    <h3>Enter Your Email Address</h3>
                                    <p> Check email for verification link</p>
                                    {{Form::open(['route'=>'email.verification','method'=>'post'])}}
                                    <input type="email" name="email" class="form-control rounded-0">
                                    <input type="hidden" name="verification" value="1">
                                    <button type="submit" class="btn btn-info rounded-0 mt-2">Submit</button>
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