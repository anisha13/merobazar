<div class="text-right productview">View: <span><button class="btn bnt-link p-2" type="btn" id="list"><i class="fa fa-list fa-1x"></i></button></span> &nbsp; &nbsp; <span>
    <button class="btn bnt-link p-2" type="btn" id="grid"><i class="fa fa-th fa-1x"></i></button>
  </span></div>
@if(!empty($name))
<h3 class="text-center">{{$name}}</h3>
@endif
<div class="row pt-3">
  @if(!empty($cat))
  <input type="hidden" value="{{$cat->id}}" id="hidecat">
  @else
  <input type="hidden" value="all" id="hidecat">
  @endif

  @foreach($products as $product)





  <div class="col-lg-12 col-sm-12 col-md-12 col-12 listview" style="display:none;">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-md-12 col-12">
        <a href="{{route('detail',$product->slug)}}" style="text-decoration:none;">
          <div class=" mb-3" style="">
            <div class="row ">
              <div class="col-md-3 col-lg-3 col-sm-3 col-6 smallproduct">
                @if(!empty($product->discount))
                <span class="badge badge-warning" style="width:60px; position: absolute; ">{{$product->discount}}% OFF</span>
                @endif
                <img src="{{asset('images/'.$product->thumbnail)}}" class="p-3 " height="150" alt="...">
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-10 smallproducttitle">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card-body smallproductcard">
                      <h5 class="card-title text-dark">{{$product->name}}</h5>




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
  <div class="col-lg-3 pt-2 col-sm-3 col-md-3 col-6 gridview  rounded shadow-sm border-0 hoverable thumblist overlay zoom">

    <div class=" rounded-0  productimage" style="border:1px solid black; width:14rem;">
      @if(!empty($product->discount))
      <span class="badge badge-warning m-2" style="width:60px; position: absolute; ">{{$product->discount}}% OFF</span>
      @endif
      <a href="{{route('wishlist',$product->id)}}">
        <img src="{{asset('images/heart.PNG')}}" style="height:40px; width:40px; z-index:999; " class="d-block ml-auto p-2 ">
      </a>
      <a href="{{route('detail',$product->slug)}}" style="text-decoration:none;" class="text-muted">

        <img src="{{asset('images/'.$product->thumbnail)}}" height="150" class="rounded mx-auto d-block " style="width:150px;">
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


  @endforeach



</div>
@if(!empty($products))
<div class="pt-5 text-center">
  {{ $products->links() }}
</div>
@endif

<script type="text/javascript">
  $('.add-to-carts').click(function() {

    slug = $(this).data('slug');
    qty = $(this).data('qty');
    size = $(this).data('size');
    color = $(this).data('color');
    attribute = $(this).data('attribute');

    base = $('base').attr('href');
    url = base + '/cart/add/' + slug + '/' + qty + '/' + size + '/' + color + '/' + attribute;
    $.get(url).done(function(response) {

      toastr.success(response.success);

      $.get(base + '/cart/details').done(function(response) {
        // $('#header-qty').html(response.items);
        $('.headerqty').html(response.items);
        // $('#headerqty').html(response.items);
        $('#header-price').html(response.total);
      })
    });
  });
</script>
<script>
  $('#list').click(function() {

    $('.listview').show('200');
    $('.gridview').hide('200');
  })
  $('#grid').click(function() {

    $('.gridview').show('200');
    $('.listview').hide('200');
  })
</script>