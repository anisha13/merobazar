<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
   public function brand(Request $request)
   {
            
       if (isset($request->brand))
       {
        
            $brand = $request->brand;
            $product = Product::whereIN('brand_id',explode(",",$brand))
            ->where('status','1')->where('verification','1')->get();
            $products = Product::whereIN('brand_id',explode(",",$brand))
            ->where('status','1')->where('verification','1')->paginate(20);
            $count =$product->count();

            response()->json($products);

            return view('front.products',compact('products','count'));
       }
       else if($request->brand == null){
                
            // $products = Product::paginate(18);
           $products = Product::orderBy('created_at','desc')->where('status','1')->where('verification','1')->whereNull('seller_id')->get();

           $count =$products->count();
           response()->json($products);
           return view('front.products',compact('products','count'));
       }

   }

  public function category(Category $category)
  {
    $cat = $category;
    $products = Product::where('status','1')->where('verification','1')->where('cat_id',$category->id)->orderBy('updated_at','desc')->paginate(20);
    response()->json($products);
     $count =$products->count();

    return view('front.products',compact('products','count','cat'));
  }
  public function price($value,$max,$min)
  {
    $category =Category::where('id',$value)->where('status','1')->first();
    if($value=="all")
    {
      $products =Product::orderBy('updated_at','desc')->where('status','1')->where('verification','1')->whereBetween('price',[$min,$max])->get();
       response()->json($products);
       return view('front.products',compact('products','count'));
    }
    
    if(!empty($category))
    {
      $cat =$category;
       $products =Product::orderBy('updated_at','desc')->where('cat_id',$category->id)->where('status','1')->where('verification','1')->whereBetween('price',[$min,$max])->get();
       response()->json($products);
       return view('front.products',compact('products','count','cat'));
    }
    else
    {
      $products =Product::orderBy('updated_at','desc')->where('status','1')->where('verification','1')->whereBetween('price',[$min,$max])->get();
       response()->json($products);
       return view('front.products',compact('products','count'));
    }
   
  }
    public function shop(Request $request,$start,$end)
    {

        $products = Product::whereBetween('price',[$start,$end])->where('status','1')->where('verification','1')->get();
        response()->json($products);
        return view('front.products',compact('products'));

    }
}
