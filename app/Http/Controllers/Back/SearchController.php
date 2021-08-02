<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
         
       
      $q=$request->q;
        $products = Product::where('status','1')->where('verification','1')->where('name', 'LIKE', '%' . $q . '%')->paginate(10);

      
        return view('front.product',compact('products'));
    }
}
