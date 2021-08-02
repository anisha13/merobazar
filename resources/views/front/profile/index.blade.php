@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')


<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;"> Your Profile</div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-9">
            <span style="font-size:20px;">Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span> {{auth()->user()->name}}</span><br>
            <span style="font-size:20px;">Email</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span> {{auth()->user()->email}}</span><br>
            <span style="font-size:20px;">Phone</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span> {{auth()->user()->phone}}</span><br>
            <span style="font-size:20px;">Account Type</span>&nbsp;: <span> {{auth()->user()->acc_type}}</span><br>
            <span style="font-size:20px;">Address</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span> {{auth()->user()->address}}</span><br>
            <div class="text-center">
                <button class="btn btn-success p-2" style="background-color: #002f34 !important;" data-toggle="modal" data-target="#basicExampleModal"><i class="fa fa-edit"></i> Edit profile</button>
                <button class="btn btn-success p-2" style="background-color: #002f34 !important;" data-toggle="modal" data-target="#changepassword"><i class="fa fa-edit"></i> Edit password</button>
            </div>
        </div>
        <div class="col-lg-3 text-center">
            @if(!empty(auth()->user()->image))
            <img src="{{asset('images/'.auth()->user()->image)}}" height="120" style="border-radius:50%">
            @else
            <img src="{{asset('images/profile.png')}}" height="120">
            @endif
            <span class="badge badge-success p-1"><i class="fa fa-check-circle"></i> Verified Account</span>
        </div>
    </div>


</div>
</div>
</div>
</div>


<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#002f34 !important;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
            {{Form::open(['route'=>'profile.store','method'=>'post','enctype'=>'multipart/form-data'])}}
                <div class="row">
                    <div class="form-group col">
                        <label>Name</label>
                        <input type="text" name="name" required class="rounded-0 form-control" value="{{auth()->user()->name}}">
                    </div>
                   

                    <div class="form-group col">
                    @if(empty(auth()->user()->image))
                    <img src="{{asset('images/profile.png')}}" height="60">
                    
                    @else
                    <img src="{{asset('images/'.auth()->user()->image)}}" height="60">
                    @endif
                        <label>Image</label>
                        <input type="file" name="image" required class="rounded-0 form-control" value="">
                        <input type="hidden" name="oldfile" required class="rounded-0 form-control" value="{{auth()->user()->image}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Email</label>
                        <input type="email" name="email" required class="rounded-0 form-control" value="{{auth()->user()->email}}" readonly>
                    </div>
                    <div class="form-group col">
                        <label>Phone</label>
                        <input type="text" name="phone" required class="rounded-0 form-control" value="{{auth()->user()->phone}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Address</label>
                        <textarea class="form-control rounded-0" name="address"  required>{{auth()->user()->address}}</textarea>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Account Type</label>
                    <select class="form-control rounded-0 " id="exampleFormControlSelect1" name="acc_type" readonly>
                        <option>{{auth()->user()->acc_type}}</option>
                        
                    </select>
                </div>

                <button class="btn btn-defaulr p-2 rounded-0" style="background-color: #002f34 !important; color:white;" type="submit">Update Profile</button>
              {{Form::close()}}
            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog rounded-0" role="document">
                  <div class="modal-content rounded-0">
                    <div class="modal-header rounded-0" style="background-color:#2bbbad !important;">
                      <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-12">
                          {{Form::open(["method"=>"patch","route"=>["password.change",auth()->user()->id]])}}
                          <label>Current Password</label>
                          <div class="form-group pass_show">

                            {{Form::password('old_password',['class'=>'form-control rounded-0','required'])}}

                          </div>
                          <label>New Password</label>
                          <div class="form-group pass_show">

                            {{Form::password('password',['class'=>'form-control rounded-0','required'])}}

                          </div>
                          <label>Confirm Password</label>
                          <div class="form-group pass_show">
                            {{Form::password('password_confirmation',['class'=>'form-control rounded-0','required'])}}

                          </div>
                          <button type="submit" class="btn btn-default sitecolor rounded-0">Update</button>
                          {{Form::close()}}

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>









@include('front.includes.footer')