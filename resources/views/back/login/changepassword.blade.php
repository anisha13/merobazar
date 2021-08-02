@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')
<div class="container-fluid rounded-0">
    <div class="row card rounded-0">
        <div class="col-lg-12 text-center">
            <h3>Your Profile</h3>
        </div>
    </div>
</div>

<div class="container-fluid " style="color:black;">
    <div class="row  rounded-0">
        <div class="col-lg-8 pl-5 p-3">
            <h4>Name &nbsp;&nbsp;&nbsp;&nbsp; : {{auth()->user()->name}}</h4>
            <p>E-mail&nbsp;&nbsp;&nbsp;&nbsp; : {{auth()->user()->email}}</p>
            <p>Phone&nbsp;&nbsp;&nbsp;&nbsp; : {{auth()->user()->contact}}</p>
            <p>Address&nbsp;&nbsp;: {{auth()->user()->address}}</p>
            <p>Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{auth()->user()->roles}}</p>
        </div>
        <div class="col-lg-4 text-center">
            @if(!empty(auth()->user()->image))
            <img src="{{asset('/images/'.auth()->user()->image)}}" height="150"><br><br>
            @else
            <img src="{{asset('/images/profile.png')}}" height="150"><br><br>
            @endif
            <span class="badge badge-success"><i class="fa fa-check-circle"></i> Verified account</span>
        </div>
        <div class="row mt-2">
        <div class="col-lg-12 pl-5 ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info rounded-0 p-2" data-toggle="modal" data-target="#editprofile">
                Edit Profile
            </button>

            <!-- Modal -->
            <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{Form::open(['method'=>'patch','route'=>'admin.update','enctype'=>'multipart/form-data'])}}
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control " value="{{auth('admin')->user()->name}}" required>

                                    </div>

                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control" value="{{auth('admin')->user()->email}}" required disabled>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Roles</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="roles" disabled="">
                                            <option value="{{auth('admin')->user()->roles}}">{{auth('admin')->user()->roles}}</option>
                                            <option value="admin">Admin</option>
                                            <option value="shopkeeper">Shop Keeper</option>
                                            <option value="shopmanager">Shop Manager</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2 ">
                                        @if(auth('admin')->user()->image != null)
                                        <img src="{{asset('/images/'.auth('admin')->user()->image)}}" height="100">
                                        @else
                                        <img src="{{asset('/images/images.png')}}" height="80">
                                        @endif

                                    </div>
                                    <div class="form-group text-center d-flex mx-auto">
                                        <input type="file" name="image" class="" accept="image/*">
                                        <input type="hidden" id="image" name='old_image' class="form-control" value="{{auth('admin')->user()->image}}" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{auth('admin')->user()->contact}}" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address">{{auth('admin')->user()->address}}</textarea>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Update Admin" class="btn btn-info pl-2 pr-2 rounded-0">
                            </div>
                            {{Form::close()}}
                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info p-2 rounded-0" data-toggle="modal" data-target="#changepassword">
                Change Password
            </button>

            <!-- Modal -->
            <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="col-lg-12 col-sm-12 col-md-12 mx-auto ">
            
               
                <div class="">
                    @include('back.includes.message')


                    {{Form::open(['route'=>'admin.updatepassword','method'=>'patch'])}}

                    <div class="form-group">
                        {{Form::label('old_password','Old Password')}}
                        {{Form::password('old_password',['class'=>'form-control','required'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('password','New Password')}}
                        {{Form::password('password',['class'=>'form-control','required'])}}
                    </div>

                    <div class="form-group">


                        {{Form::label('password_confirmation','Confirm Password')}}
                        {{Form::password('password_confirmation',['class'=>'form-control','required'])}}
                    </div>



                    <div class="form-group">
                            <input type="submit" value="Update Password" class="btn btn-info p-2 rounded-0">
                        </div>
                    {{Form::close()}}
                </div>
           
        </div>
                        </div>
                      
                    </div>
                </div>
            </div>



        </div>
        </div>
        
    </div>
</div>


@include('back.includes.footer')