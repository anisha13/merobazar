<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

use App\Product;
use App\Gallery;
use App\Attribute;

use DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
     public function store(Request $request)
    {
        
        
     
         $parentcat =Category::find($request->category);
        
        $request->validate([
            'product' => 'required|unique:products,name',
            'category' => 'required',
            'product_price' => 'required',
        ]);
      
     
    	$product = new Product();
    	$product->cat_id =$request->category;
        $product->brand =$request->brand;
        if(!empty($parentcat))
        {
          $product->maincat_id = $parentcat->id;
        }
        else
        {
            $product->maincat_id =$request->id;
        }
 
    	$product->name =$request->product;
    	$product->discount =$request->discount;
    	$product->color =$request->color;
    	$product->slug =rand().$request->name;
    
    	$product->price =$request->product_price;
    	$product->discount =$request->discount;
    	
    	
    	$product->description=$request->shortdesc;
    	
   
    	$product->seller_id =auth()->user()->id;
      $product->location =$request->place;
      

    	 if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);


            $product->thumbnail = $imagename;
        }
    	
    	$product->save();
         
       

    
   $notification =array('message'=>'Product added successfully',
                        'alert-type'=>'success');
                        return back()->with($notification);



  }
  public function addImage(Product $product)
  {
      response()->json('hello');
       return view('front.new.prodimage',compact('product'));
  }
  public function addAttribute(Product $product)
  {
      response()->json('hello');
       return view('front.new.prodattribute',compact('product'));
  }
  public function edit(Product $product)
  {
     $pro =$product;
        $brands = Brand::where('status','1')->get();
        $sections = Prosection::all();
         $section_drop ="<option selected disabled>Select</option>";
        foreach ($sections as $section)
        {
            if($section->name == $product->section){
                $selected ='selected';
            }
            else{
                $selected='';
            }

            $section_drop .="<option  ".$selected.">".$section->name."</option>";

        }
        $brand_drop ="<option selected disabled>Select</option>";
        foreach ($brands as $bran)
        {
            if($bran->id == $product->brand_id){
                $selected ='selected';
            }
            else{
                $selected='';
            }

            $brand_drop .="<option value='".$bran->id."' ".$selected.">".$bran->name."</option>";

        }
        $categories = Category::where(['parent_id'=>0])->where('status','1')->get();

        $categories_drop ="<option selected disabled>Select</option>";
             
        foreach ($categories as $category){
            if($category->id == $product->cat_id){
                $selected ='selected';
            }
            else{
                $selected='';
            }

            $categories_drop .="<option value='".$category->id."' ".$selected.">".$category->name."</option>";
            $sub_categories = Category::where('status','1')->where(['parent_id' => $category->id])->get();

            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $product->cat_id){
                    $selected ='selected';
                }
                else{
                    $selected='';
                }

                $categories_drop .="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
                 $sub_cat_sub = Category::where('status','1')->where(['parent_id' => $sub_cat->id])->get();
                 
                 foreach ($sub_cat_sub as  $value) {
                     
                    if($value->id == $product->cat_id)
                    {
                      $selected ='selected';
                    }
                    else
                    {
                      $selected='';
                    }

                    $categories_drop .="<option value='".$value->id."' ".$selected.">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;".$value->name."</option>";
                 
                        // $categories_dropdown .="<option value='".$value->id."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;".$value->name."</option>";
                    }
            }
        }

          response()->json('hello');
       return view('front.new.prodedit',compact(['product','categories_drop','brand_drop','section_drop']));
  }

   public function update(Request $request, Product $product)
    {
      $parentcat =Category::find($request->category);
        
      
     
    	$product->cat_id =$request->category;
        $product->brand =$request->brand;
        if(!empty($parentcat))
        {
          $product->maincat_id = $parentcat->id;
        }
        else
        {
            $product->maincat_id =$request->id;
        }
 
    	$product->name =$request->product;
    	$product->discount =$request->discount;
    	$product->color =$request->color;
    	$product->slug =rand().$request->name;
    
    	$product->price =$request->product_price;
    	$product->discount =$request->discount;
    	
    	
    	$product->description=$request->shortdesc;
    	
   
    	$product->seller_id =auth()->user()->id;
      $product->location =$request->place;
      
      $oldimage = $request->oldfile;
      
          if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);
            if ($oldimage != null)
            {
                unlink('images/'.$oldimage);
            }

            $product->thumbnail = $imagename;


        }



      $product->save();
         

    
      $notification =array('message'=>'Product updated successfully',
      'alert-type'=>'success');
      return back()->with($notification);
            

    }

     public function attributestore(Request $request)
   {
    
    if($request->isMethod('post'))
    {
      $data=$request->all();
   
      foreach ($data['sku'] as $key => $value) {
        $attribute = new Attribute();
        $attribute->product_id =$request->product;
        $attribute->sku = $value;
        $attribute->size = $data['size'][$key];
        $attribute->stock = $data['stock'][$key];
        // $attribute->price = $data['price'][$key];
        $attribute->save();
      }
    }
         return redirect()->back();
    }

    public function status(Product $product,$status)
    {
      $product->status =$status;
      $product->save();

      $notification =array('message'=>'Status updated waiting for admin verification ',
                        'alert-type'=>'info');
                        return back()->with($notification);
    }

    public function imagestore(Request $request)
   {
          if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $originalname = time() . '' . $image->getClientOriginalName();
                $destination = 'images/' . $originalname;
                Image::make($image)->resize(300, 300)->save($destination);
                $gallery = new Gallery;
                $gallery->product_id = $request->product;
                $gallery->image = $originalname;
                $gallery->save();
            }
   }
   $notification =array('message'=>'Image stored successfully',
   'alert-type'=>'success');
   return back()->with($notification);
 }
 public function gallerystatus(Gallery $gallery,$status)
    {
      $gallery->status =$status;
      $gallery->save();

      $notification =array('message'=>'Status updated successfully',
      'alert-type'=>'success');
      return back()->with($notification);
    }
}
