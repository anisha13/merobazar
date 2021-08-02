<?php
// $products = App\Product::where('status', '1')->orderBy('created_at','desc')->get();
$pro =App\Product::where('status','1')->orderBy('created_at','desc')->first();
$categoryimage =App\Category::where('status','1')->where('parent_id','0')->get();
?>
@include('front.includes.header')

<!--------------------------------Slider-------------------------------------------->
<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade mt-2" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        @php($slider =App\Slider::orderBy('created_at','desc')->first())
        
        <div class="carousel-item active">
            @if(!empty($slider))
            <img class="d-block w-100" src="{{asset('images/'.$slider->image)}}" alt="First slide">
            @endif
        </div>
        <!--/First slide-->
        <!--Second slide-->
        @if(!empty($slider))
        @php($sliders =App\Slider::orderBy('created_at','desc')->where('id','!=',$slider->id)->get())
        @foreach($sliders as $slider)
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/'.$slider->image)}}" alt="Second slide">
        </div>
        @endforeach
        @endif
        <!--/Second slide-->
        <!--Third slide-->

        <!--/Third slide-->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->


<div class="container-fluid ">
    <div class="row pl-3 pr-3">
        <div class="col-lg-12">
            <div class="categoryslider owl-carousel owl-theme mt-5 mx-auto">
  @foreach($categoryimage as $category)
<div class="item text-center">
  <a href="{{route('category.product',$category->id)}}" style="text-decoration:none;" class="text-muted">
  <img src="{{asset('images/'.$category->image)}}" class=" d-block mx-auto" style="border-radius: 50%; height:100px; width:100px">
  {{$category->name}}
  </a>
</div>
@endforeach

</div>
        </div>

</div>
</div>



@php($ads =App\Admanagement::where('setlocation','below slider')->where('status','1')->orderBy('created_at','desc')->limit(2)->get())




@if($ads->count() != "0")
<div class="container-fluid mt-3">
  @if($ads->count() == '2')
  <div class="row pl-3 pr-3">
    @foreach($ads as $ad)
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <a href="{{$ad->url}}">
      <img src="{{asset('images/'.$ad->image)}}" class="img-fluid mx-auto d-block">
        </a>
    </div>
    @endforeach

  </div>
  @else
  @foreach($ads as $ad)
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
  <a href="{{$ad->url}}">
    <img src="{{asset('images/'.$ad->image)}}" class="img-fluid mx-auto d-block">
  </a>
  </div>
  @endforeach

  @endif


</div>
@endif





<div class="container-fluid pl-5 pr-5 mt-3">
    

    @php($productcategories = App\Brand::orderBy('created_at','asc')->get())
@foreach($productcategories as $productcategory)
@php($products =App\Product::inRandomOrder()->where('brand',$productcategory->name)->where('status','1')->where('verification','1')->limit(12)->get())
<div class="row">
        <div class="col-lg-12">
            <span style="font-size:15px; font-weight:bold;">{{$productcategory->name}}</span><span style="float:right;"><a href="{{route('productpage',$productcategory->id)}}" >View All</a></span>
           
            
        </div>

    </div>

    
    <div class="row owl-carousel" id="updateDiv" style="margin:0 !important">
        @foreach($products as $product)
        <div class="col-lg-12 col-md-12 col-sm-12 item  mt-2">
           
                <div class="card rounded-0 indexproductcard  " style="border:1px solid black; width:13rem;">
                @if(!empty($product->discount))
                    <span class="badge badge-warning m-2" style="width:60px; position: absolute; ">{{$product->discount}}% OFF</span>
                    @endif
                    <a href="{{route('wishlist',$product->id)}}">
                    <img src="{{asset('images/dill.png')}}" style="height:40px; width:40px; z-index:999; " class="d-block ml-auto p-2 indexproductimage ">
                    </a>
                    <a href="{{route('detail',$product->slug)}}" style="text-decoration:none;" class="text-muted">
                   
                    <img src="{{asset('images/'.$product->thumbnail)}}" height="150" class="rounded mx-auto d-block img-responsive indexthumbnail " style="width:150px;">
                    <h5 style="color:black;" class="pl-3">
                        @php($discount = $product->price-($product->price * $product->discount/100))
                        NPR {{number_format($discount)}}
                    </h5>
                    <h6 class="pl-3">@php($name=substr($product->name,0,5)){{$name}}</h6>
                    @php($user =App\User::where('id',$product->seller_id)->first())
                    @if(!empty($user))
                    <span style="font-size:10px" class="pl-3">{{$user->name}}</span><p class="pl-3" style="font-size:10px">{{\Carbon\Carbon::parse($user['created_at'])->diffForHumans(null, null, null, 2)}}</p>
                    @else
                    <span style="font-size:10px" class="pl-3">Admin</span><p class="pl-3" style="font-size:10px">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</p>
                    @endif
                </a>
                </div>
           


        </div>
        @endforeach
    </div>
    @php($category =App\Admanagement::where('setlocation',$productcategory->name)->where('status','1')->orderBy('created_at','desc')->limit(2)->get())
@if($category->count() != "0")
<div class="container-fluid mt-3">
  @if($category->count() == '2')
  <div class="row pl-3 pr-3">
    @foreach($category as $ad)
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
    <a href="{{$ad->url}}">
      <img src="{{asset('images/'.$ad->image)}}" class="img-fluid mx-auto d-block">
    </a>
    </div>
    @endforeach

  </div>
  @else
  @foreach($category as $ad)
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
  <a href="{{$ad->url}}">
    <img src="{{asset('images/'.$ad->image)}}" class="img-fluid mx-auto d-block">
  </a>
  </div>
  @endforeach

  @endif


</div>
@endif
    @endforeach
<!-- @if(!empty($pro))
    <div class="row mt-5">
        <div class="col-lg-12 text-center">
            <button class="btn btn-outline-dark" data-id="{{$pro->id}}" id="loadmore">Load More <img src="{{asset('images/200.gif')}}" height="20"></button>
        </div>
    </div>
    @endif -->
</div>




@include('front.includes.footer')

     
<script>
    $("#loadmore").click(function(){
        var id = $(this).data('id');
       $("#loadmore").html("Loading....");
       base = $('base').attr('href');
        url = base+'/load/more';
       $.ajax({
           url : url,
           type : "POST",
           data:{id:id},
           success:function(response){
               alert(response);
                 }
           });
      
     
    });
</script>
<script>
$(document).ready(function() {
              $('.categoryslider').owlCarousel({
                loop: true,
                margin: 5,
                responsiveClass: true,
                autoplay:true,
               
                autoplayHoverPause:true,
                responsive: {
                  0: {
                    items: 5,
                    nav: true
                  },
                  600: {
                    items: 5,
                    nav: false
                  },
                  1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                    
                  }
                }
              })
             })
  
</script>
<script type="text/javascript">
          
      $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 5,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 2,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    
                  }
                }
              })
             })
  
</script>