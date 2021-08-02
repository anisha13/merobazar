@include('front.includes.header')
<?php

use App\Category;

$categories =Category::where('status','1')->get();
?>
<div class="container-fluid pr-5 pl-5 mt-3 hammenu">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Products</a></li>
    
  </ol>
</nav>
</div>

<div class="container-fluid pr-5 pl-5">
   
  <div class="row" >
  
    <div class="col-lg-3 col-md-2 col-sm-2 col-12 mt-3 brandsearch" >
      
      <div class="card rounded-0 shadow-sm">

  <article class="card-group-item">
    <header class="card-header rounded-0 sitecolor" style="background-color: #002f34 !important;">
      <span class="title brandstitle" style="color:white; font-size:18px; font-weight:bold;">Categories </span>
      <span class="pull-right text-right brandcount">({{$categories->count()}})</span>
    </header>
    <div class="filter-content">
      <div class="card-body brandsearch">
        @foreach($categories as $category)
      <label class="form-check ">
        @if(!empty($cat))

        <input class="form-check-input catfilter"  type="radio" name="exampleRadio" value="{{$category->id}}" <?php if($cat->id == $category->id ){
          echo 'checked';
        } ?>
        >
        <span class="form-check-label brandname">
         {{$category->name}}
        </span>
        @else
        <input class="form-check-input catfilter"  type="radio" name="exampleRadio" value="{{$category->id}}">
        <span class="form-check-label brandname">
         {{$category->name}}
        </span>
        @endif
      </label>
      @endforeach
     
      </div> <!-- card-body.// -->
    </div>
  </article> <!-- card-group-item.// -->
</div>

<div class="card">
  <article class="card-group-item">
    <header class="card-header rounded-0 sitecolor" style="background-color: #002f34 !important;">
      <h6 class="title brandstitle" style="color:white;">Range input </h6>
    </header>
    <div class="filter-content">
      <div class="card-body">
      <div class="form-row">
      <div class="form-group col mininput">
        <label class="minimum">Min</label>
        <input type="number" class="form-control min rounded-0" id="inputEmail4" value="50" placeholder="50">
      </div>
      <div class="form-group col text-right maxinput">
        <label class="maximum">Max</label>
        <input type="number" class="form-control max rounded-0" placeholder="1,0000" value="5000">
      </div>
      <div class="form-group  text-right">
        <br>
        <button class="btn btn-default pricerange  rounded-0 sitecolor mt-2 p-2" id="price" style="background-color: #002f34 !important;">Go</button>
      </div>
      </div>
      </div> <!-- card-body.// -->
    </div>
  </article> <!-- card-group-item.// -->

</div>

    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-12 rounded-0 searchedproduct" id="updateDiv" >
      <!-- <div style="display: flex;">
    <button class="btn btn-info rounded-0 btn-sm p-1" id="btnLeft" style="display:none;"><i class="fa fa-bars"></i></button>
    <button class="btn btn-info rounded-0 btn-sm p-1" id="btnCross" style="display:none;"><i class="fa fa-times"></i></button>
      </div> -->
        <div class="text-right productview">View: <span><button class="btn bnt-link p-2" type="btn" id="list"><i class="fa fa-list fa-1x"></i></button></span> &nbsp; &nbsp; <span>
            <button class="btn bnt-link p-2" type="btn" id="grid"><i class="fa fa-th fa-1x"></i></button>
        </span></div>
      @if(!empty($name))
      <h3 class="text-center">{{$name}}</h3>
      @endif
      <div class="row pt-3" style="padding-left: 18px !important;">
        @if(!empty($cat))
        <input type="hidden" value="{{$cat->id}}" id="hidecat">
        @else
        <input type="hidden" value="all" id="hidecat">
        @endif
       
        @foreach($products as $product)
      
        
        @if(!empty($product))
       
         
          <div class="col-lg-12 col-sm-12 col-md-12 col-12 listview"  style="display:none;">
            <div class="row">
             <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                 <a href="{{route('detail',$product->slug)}}" style="text-decoration:none;">
             <div class="card mb-3" style="">
              <div class="row ">
                <div class="col-md-3 col-lg-3 col-sm-3 col-2 smallproduct" >
                    @if(!empty($product->discount))
              <span class="badge badge-warning" style="width:60px; position: absolute; ">{{$product->discount}}% OFF</span>
              @endif
                  <img src="{{asset('images/'.$product->thumbnail)}}" class="p-3 " height="150" alt="...">
                </div>
                <div class="col-md-8 col-lg-8 col-sm-8 col-10 smallproducttitle">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card-body smallproductcard">
                    <h5 class="card-title text-dark" >{{$product->name}}</h5>
                    @php($user =App\User::where('id',$product->seller_id)->first())
                    @if(!empty($user))
                    <span style="font-size:17px; color:black;" class="pl-3">{{$user->name}}</span><br><span class="pl-3" style="font-size:15px">{{\Carbon\Carbon::parse($user['created_at'])->diffForHumans(null, null, null, 2)}}</span>
                    @else
                    <span style="font-size:10px" class="pl-3">Admin</span><span class="pl-3" style="font-size:10px">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</span>
                    @endif
    
                 
                      
                      <br>

                  
                    </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
             </a>
             </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-3 col-md-3 col-6 gridview mt-2 pl-3 rounded shadow-sm border-0 hoverable thumblist overlay zoom" >
             
            
          <div class=" rounded-0 indexproductcard " style="border:1px solid black; width:13rem;">
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
                    <h6 class="pl-3 ">{{$product->name}}</h6>
                    @php($user =App\User::where('id',$product->seller_id)->first())
                    @if(!empty($user))
                    <span style="font-size:10px" class="pl-3 name">{{$user->name}}</span><p class="pl-3 hour" style="font-size:10px">{{\Carbon\Carbon::parse($user['created_at'])->diffForHumans(null, null, null, 2)}}</p>
                    @else
                    <span style="font-size:10px" class="pl-3 name">Admin</span><p class="pl-3 hour" style="font-size:10px">{{\Carbon\Carbon::parse($product['created_at'])->diffForHumans(null, null, null, 2)}}</p>
                    @endif
                  </a>
                </div>
                
             
          </div>
          @else
          
          <h3 class="text-muted text-center">No Product Found related to your search</h3>
          @endif
      
    
        @endforeach



      </div>
      @if(!empty($products))
      <div class="pt-5 text-center">
        {{ $products->links() }}
      </div>
      @endif
    </div>
  </div>
</div>

@include('front.includes.footer')

<script type="text/javascript">
  $('.add-to-carts').click(function(){
    
        slug =$(this).data('slug');
        qty= $(this).data('qty');
        size =$(this).data('size');
        color =$(this).data('color');
        attribute = $(this).data('attribute');
       
        base = $('base').attr('href');
        url = base+'/cart/add/'+slug+'/'+qty+'/'+size+'/'+color+'/'+attribute;
        $.get(url).done(function (response) {

         toastr.success(response.success);

            $.get(base+'/cart/details').done(function (response) {
               // $('#header-qty').html(response.items);
                 $('.headerqty').html(response.items);
                // $('#headerqty').html(response.items);
                $('#header-price').html(response.total);
            })
        });
    });
</script>


<script>
  $('#list').click(function(){
   
     $('.listview').show('200');
    $('.gridview').hide('200');
  })
  $('#grid').click(function(){
 
    $('.gridview').show('200');
    $('.listview').hide('200');
  })

</script>
<script>
   $("#btnLeft").click(function(){
     $('#sidenav').css('display','block');
     $('#btnLeft').css('display','none');
     $('#btnCross').css('display','block');
   })
</script>