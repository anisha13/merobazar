@include('front.includes.header')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f7da45aa1653f48"></script>




<div class="container-fluid pl-5 pr-5">
    <div class="row mt-3">
        <div class="col-lg-7 col-12">
            <div class="row">
                <div class="col-lg-12 card z-depth-0" style="border: 1px solid gray; ">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active easyzoom easyzoom--adjacent" id="home" role="tabpanel" aria-labelledby="home-tab" style="min-height: 400px;">
                            <a href="{{asset('images/'.$product->thumbnail)}}">
                                <img src="{{asset('images/'.$product->thumbnail)}}" class="d-block mx-auto p-5 img-fluid" height="400">
                            </a>
                        </div>
                        @foreach($productgallery as $gallery)
                        <div class="tab-pane fade easyzoom--overlay" id="gallery-{{$gallery->id}}" role="tabpanel" aria-labelledby="profile-tab" style="min-height: 400px;">
                            <img src="{{asset('images/'.$gallery->image)}}" class="d-block mx-auto p-5" height="400">
                        </div>
                        @endforeach
                        <!--  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="min-height: 300px;">...</div> -->
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><img src="{{asset('images/'.$product->thumbnail)}}" height="20"></a>
                        </li>


                        @foreach($productgallery as $gallery)
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gallery-{{$gallery->id}}" role="tab" aria-controls="profile" aria-selected="false"><img src="{{asset('images/'.$gallery->image)}}" height="20"></a></a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 card z-depth-0" style="border: 1px solid gray;">
                    <span class="pt-2" style="text-decoration:underline; font-size:20px;">Description</span>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12 pl-4">
            <div class="row">
                <div class="col-lg-12 card z-depth-0 pt-2" style="border: 1px solid gray;">
                    @if(!empty($product->discount))
                    <span class="badge badge-danger" style="max-width:60px;">{{$product->discount}}% off</span>
                    @endif
                    <h5 class="price text-uppercase" style="color:black;">
                        @php($discountprice = $product->price - $product->price*$product->discount/100)
                        <span>NPR @if(!empty($product->discount)) {{$discountprice}} @else {{number_format($product->price,'2')}} @endif <strike style="color:#C0C0C0 !important; font-size:15px;">@if(!empty($product->discount)) NPR {{$product->price}} @endif</strike></span>
                        <span style="float:right; display:flex">
                            <div class="addthis_inline_share_toolbox"></div>
                            <a href="{{route('wishlist',$product->id)}}">
                                <img src="{{asset('images/dill.png')}}" height="25">
                            </a>
                        </span>
                    </h5>
                    <span class="text-muted">{{$product->name}}</span>
                    <span class="mt-3">
                        @if(!empty($product->seller_id))
                        @php($user =App\User::where('id',$product->seller_id)->first())
                        <a>{{$user->name}}</a><a style="float: right;">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</a>

                        @else
                        <a>Admin</a><a style="float: right;">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</a>

                        @endif
                    </span>
                </div>

            </div>
            @php($user =App\User::where('id',$product->seller_id)->first())
            <div class="row mt-2">
                <div class="col-lg-12 card z-depth-0 " style="border: 1px solid gray;">
                    <p style="font-size:20px;" class="text-muted">Seller Description</p>
                    <div class="row">
                        <div class="col-lg-2">
                            @if(empty($user->image))
                            <img src="{{asset('images/profile.png')}}" height="60" style="border-radius:50%;">
                            @else
                            <img src="{{asset('images/'.$user->image)}}" height="60" style="border-radius:50%;">
                            @endif
                        </div>
                        <div class="col-lg-9">
                            @if(empty($product->seller_id))
                            <h5>Admin</h5>
                            @else

                            <h5>{{$user->name}}</h5>
                            <p>{{$user->phone}}</p>
                            <p class="text-muted" style="margin-top:-10px; font-size:12px;">Member Since {{\Carbon\Carbon::parse($user['created_at'])->diffForHumans(null, null, null, 2)}} </p>

                            @endif



                        </div>


                    </div>
                    <button class="btn btn-default " id="message" style="background-color: #002f34 !important;">Message To Seller</button>
                    <div class="col-lg-12" id="messageDiv" style="display:none">
                        {{Form::open(['route'=>'question.send','method'=>'post'])}}
                        <div class="form-group">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea class="form-control rounded-0" name="message" placeholder="message" required></textarea>
                            <div class="row mt-2">
                                <div class="form-group col">
                                    <input type="text" name="name" class="form-control rounded-0" placeholder="name">
                                </div>
                                <div class="form-group col">
                                    <input type="email" name="email" class="form-control rounded-0" placeholder="email">
                                </div>
                                @if(!empty($product->seller_id))
                                @php($user =App\User::where('id',$product->seller_id)->first())
                                <input type="hidden" name="vendor_id" value="{{$user->id}}">
                                @else
                                <input type="hidden" name="vendor_id" value="0">
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-default btn-sm" style="background-color:#002f34 !important;" type="submit">Send</button>
                        <button class="btn btn-danger btn-sm" id="cancel" type="button">Cancel</button>
                        {{Form::close()}}
                    </div>
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-lg-12 card z-depth-0 p-3" style="border:1px solid gray">
                    <h5 class="">Posted in</h5>
                    <iframe src="https://www.google.com/maps?q={{$product->location}},Nepal&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border-radius: none; "></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pl-5 pr-5">
    <div class="row">
        <div class="col-lg-12">
            <span class="pt-2" style="text-decoration:underline; font-size:20px;">Related Products</span>
        </div>

    </div>
    @php($relatedproduct =App\Product::where('cat_id',$product->cat_id)->where('id','!=',$product->id)->where('status','1')->where('verification','1')->limit(4)->get())
    

    <div class="row">
        @foreach($relatedproduct as $product)
       
        <div class="col-lg-3 col-md-3 col-sm-3 col-6 mt-5 ">
            <div class="item">
            <div class="card rounded-0 " style="border:1px solid black; width:13rem;">
                @if(!empty($product->discount))
                <span class="badge badge-warning m-2" style="width:60px; position: absolute; ">{{$product->discount}}% OFF</span>
                @endif
                <a href="{{route('wishlist',$product->id)}}">
                    <img src="{{asset('images/dill.png')}}" style="height:40px; width:40px; z-index:999; " class="d-block ml-auto p-2 ">
                </a>
                <a href="{{route('detail',$product->slug)}}" style="text-decoration:none;" class="text-muted">

                    <img src="{{asset('images/'.$product->thumbnail)}}" height="150" class="rounded mx-auto d-block img-responsive indexthumbnail " style="width:150px;">
                    <h5 style="color:black;" class="pl-3">
                        @php($discount = $product->price-($product->price * $product->discount/100))
                        NPR {{number_format($discount)}}
                    </h5>
                    <h6 class="pl-3">{{$product->name}}</h6>
                    @php($user =App\User::where('id',$product->seller_id)->first())
                    <span style="font-size:10px" class="pl-3">Admin</span><span class="pl-3" style="font-size:10px">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</span>
                </a>
            </div>
            </div>


        </div>
        @endforeach
    </div>
</div>



@include('front.includes.footer')
<script>
    $('#message').click(function() {
        $('#messageDiv').show(1000);
        $('#message').hide();
    });
    $('#cancel').click(function() {
        $('#messageDiv').hide(1000);
        $('#message').show(1000);
    });
</script>