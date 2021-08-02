<?php

namespace App\Http\Controllers\Front;


use App\Product;
use App\Category;
use App\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
   {
   
   	$products =Product::orderBy('created_at','desc')->where('seller_id',auth()->user()->id)->get();
   		$categories =Category::all();
  

        $categor = Category::where(['parent_id'=>0])->get();

            $categories_dropdown ="<option selected disabled>Select</option>";

            foreach ($categor as $category){

                $categories_dropdown .="<option value='".$category->id."'>".$category->name."</option>";
                $sub_categories = Category::where(['parent_id' => $category->id])->get();
                
                foreach ($sub_categories as $sub_cat){
                    
                    $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
                    $sub_cat_sub = Category::where(['parent_id' => $sub_cat->id])->get();
                    foreach ($sub_cat_sub as  $value) {
                        $categories_dropdown .="<option value='".$value->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;".$value->name."</option>";
                    }

                }
            }
            $brands = Brand::all();
    return view('front.user.dashboard',compact('products','brands','categories_dropdown'));
   }
}
