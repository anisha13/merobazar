<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Product;
use App\Gallery;
// use App\review;
use App\Recentview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
   public function index(Product $product,Request $request)
{
    
       
	 $category =$product->cat_id;
   
     $products = Product::where('cat_id',$category)->get();
     $productgallery = Gallery::where('product_id','=',$product->id)->get();
     $relatedproducts =Product::where('cat_id',$category)->where('id','!=',$product->id)->inRandomOrder()->limit(6)->get();



    return view('front.detail',compact(['product','products','productgallery','relatedproducts']));
}
}
