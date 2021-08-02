<?php
// $products = App\Product::where('status', '1')->orderBy('created_at','desc')->get();
$pro =App\Product::where('status','1')->orderBy('created_at','desc')->first();
$categories =App\Category::where('parent_id','0')->get();
?>
@include('front.includes.header')

<div class="container ">
	<div class="row">
		<div class="col-lg-12 p-2">
			<h3 class="text-muted">All Categories</h3>
			  <div class="row">
                                    @foreach($categories as $category)
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <span class="text-uppercase ">
                                            <h6>{{$category->name}}</h6>
                                        </span>
                                        <hr>
                                        <ul class="nav flex-column">
                                            @foreach($category->categories as $subcat)

                                            <li class="nav-item" style="margin-top:-15px; ">
                                                <a style="color: #0d1214;" class="nav-link active" href="{{route('product.category',$subcat->url)}}">{{$subcat->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
		</div>
	</div>
</div>

@include('front.includes.footer')

     
