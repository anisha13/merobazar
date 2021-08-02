@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')


<div class="container">
    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">

            <span class="btn btn-info " data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;"></i>Company Details</span>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row ">
        <div class="col-lg-4">
            <div class="row card rounded-0">
                <div class="col-md-12 col-sm-1 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Company Details</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if(!empty($company))

                            <div class="text-center">
                                <img src="{{asset('/images/'.$company->logo)}}" height="50">
                            </div>
                            <ul>
                                <li>Phone: {{$company->phone}}</li>
                                <li>Email: {{$company->email}}</li>
                                <li>Address: {{$company->address}}</li>

                                <li>Facebook: {{$company->facebook}}</li>
                                <li>Youtube: {{$company->youtube}}</li>
                                <li>Tweeter: {{$company->tweeter}}</li>

                            </ul>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row card rounded-0">
                <div class="col-lg-12 p-3  ">

                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{$company->address}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}


                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$company->phone}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{$company->email}}" required="" >
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                    <!-- {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{$company->facebook}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{$company->youtube}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Tweeter</label>
                            <input type="text" class="form-control" name="tweeter" value="{{$company->tweeter}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}} -->

                    <!-- {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Website color</label>
                            <input type="color" id="favcolor" name="websitecolor" value="{{$company->websitecolor}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}} -->
                    {{--
         {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row">
                        <div class="col">
                            <label>Dashboard color</label>
                            <input type="color" id="favcolor" name="dashboardcolor" value="{{$company->dashboardcolor}}" required="">
                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                    --}}
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}

                    <div class="row">

                        <div class="col">
                            <label>Logo</label>

                            <input type="hidden" name="oldfile" value="{{$company->logo}}">
                            <input type="file" name="image" class="form-control">

                        </div>
                        <div class="col" style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container mb-5">
    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">
            <div class="row ">
                <div class="col-lg-12 ">
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row ">
                        <div class="col-lg-12">
                            <label style="font-size:20px;">About Company</label>
                            <textarea class="form-control ckeditor" name="about" required="">{{$company->about}}</textarea>
                        </div>
                        <div class="mx-auto"  style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>


                    </div>
                    {{Form::close()}}

                </div>
            </div>

        </div>
    </div>

    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">
            <div class="row ">
                <div class="col-lg-12 ">
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row ">
                        <div class="col-lg-12">
                            <label style="font-size:20px;">Terms of sale</label>
                            <textarea class="form-control ckeditor" name="termsofsale" required="">{{$company->termsofsale}}</textarea>
                        </div>
                        <div class="mx-auto"  style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>


                    </div>
                    {{Form::close()}}

                </div>
            </div>

        </div>
    </div>

    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">
            <div class="row ">
                <div class="col-lg-12 ">
                    {{Form::open(['method'=>'patch','route'=>['company.update',$company->id],'enctype'=>'multipart/form-data'])}}
                    <div class="row ">
                        <div class="col-lg-12">
                            <label style="font-size:20px;">Privacy Policy</label>
                            <textarea class="form-control ckeditor" name="privacy" required="">{{$company->privacy}}</textarea>
                        </div>
                        <div class="mx-auto"  style="margin-top:30px;"><button type="submit" class="btn btn-success">Save</button></div>


                    </div>
                    {{Form::close()}}

                </div>
            </div>

        </div>
    </div>
</div>






@include('back.includes.footer')