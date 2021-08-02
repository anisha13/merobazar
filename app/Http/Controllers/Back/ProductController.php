<?php

namespace App\Http\Controllers\Back;

use App\Category;
use App\Brand;
use App\Product;
// use App\Prosection;
// use App\Productcategory;
use App\Gallery;
use App\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
    //   $productcategories =Productcategory::orderBy('created_at','desc')->get();
    	$products = Product::orderBy('created_at','desc')->get();
      
    	$categories =Category::all();
    //   $prosection = Prosection::all();

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

    	return view('back.catalog.product.index',compact('categories_dropdown','brands','products'));
    }


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
    	
   
    
      $product->location =$request->place;
      

    	 if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'public/images/'.$imagename;

            Image::make($image)->resize(400, 400, function ($constraint) {
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


   public function edit(Product $product)
   {
  $categories = Category::where(['parent_id'=>0])->get();

        $categories_drop ="<option selected disabled>Select</option>";
             
        foreach ($categories as $category){
            if($category->id == $product->cat_id){
                $selected ='selected';
            }
            else{
                $selected='';
            }

            $categories_drop .="<option value='".$category->id."' ".$selected.">".$category->name."</option>";
            $sub_categories = Category::where(['parent_id' => $category->id])->get();

            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $product->cat_id){
                    $selected ='selected';
                }
                else{
                    $selected='';
                }

                $categories_drop .="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
                 $sub_cat_sub = Category::where(['parent_id' => $sub_cat->id])->get();
                 
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


        return view('back.catalog.product.edit',compact(['product','categories_drop']));

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
    	
   
    
      $product->location =$request->place;
      
      $oldimage = $request->oldfile;
      
          if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'public/images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);
            if ($oldimage != null)
            {
                unlink('public/images/'.$oldimage);
            }

            $product->thumbnail = $imagename;


        }



      $product->save();
         

    
      $notification =array('message'=>'Product updated successfully',
      'alert-type'=>'success');
      return back()->with($notification);
            

    }






   public function addAttribute(Product $product)
   {

         return view('back.catalog.product.attribute',compact('product'));
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
   	 public function addImage(Product $product)
   {
   	           
         return view('back.catalog.product.image',compact('product'));
   }


   	 public function imagestore(Request $request)
   {
   	      if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $originalname = time() . '' . $image->getClientOriginalName();
                $destination = 'public/images/' . $originalname;
                Image::make($image)->resize(300, 300)->save($destination);
                $gallery = new Gallery;
                $gallery->product_id = $request->product;
                $gallery->image = $originalname;
                $gallery->save();
            }
   }
    $notification =array('message'=>'Image Successfully Added','alert-type'=>'success');
      return redirect()->back()->with($notification);

}

		public function status(Product $product,$status)
		{
			$product->status =$status;
			$product->save();

			$notification =array('message'=>'Status Changed Successfully','alert-type'=>'success');
			return redirect()->back()->with($notification);
		}
    public function verification(Product $product,$status)
    {
      $product->verification =$status;
      $product->save();

      $notification =array('message'=>'verification status Changed Successfully','alert-type'=>'success');
      return redirect()->back()->with($notification);
    }
    public function gallerystatus(Gallery $gallery,$status)
    {
      $gallery->status =$status;
      $gallery->save();

      $notification =array('message'=>'Status Changed Successfully','alert-type'=>'success');
			return redirect()->back()->with($notification);
    }
    public function gallerydelete(Gallery $gallery)
    {
     if(!$gallery->image==null){
            $image = $gallery->image;
            unlink('public/images/'.$image);
        }
        $gallery->delete();
        $notification =array('message'=>'Data Deleted successfully','alert-type'=>'success');
			return redirect()->back()->with($notification);
    }
      public function delete(Product $product)
    {
       
         
     if(!$product->image==null){
            $image = $product->image;
            unlink('public/images/'.$image);
        }
        $product->delete();
        $notification=array('message'=>'Product Removed From Database','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function featured()
    {
      $products = Product::where('featured','yes')->orderBy('updated_at','desc')->get();
        $categories =Category::all();
      $prosection = Prosection::all();

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

      return view('back.catalog.product.featured',compact('categories_dropdown','prosection','brands','products'));
    }
    public function topselling()
    {
      $products = Product::where('topselling','yes')->orderBy('updated_at','desc')->get();
        $categories =Category::all();
      $prosection = Prosection::all();

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

      return view('back.catalog.product.topselling',compact('categories_dropdown','prosection','brands','products'));
    }
    public function trending()
    {
      $products = Product::where('tending','yes')->orderBy('updated_at','desc')->get();
        $categories =Category::all();
      $prosection = Prosection::all();

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

      return view('back.catalog.product.trending',compact('categories_dropdown','prosection','brands','products'));
    }

   public function seller()
   {
    $products =Product::where('seller_id','!=','')->get();
   
    return view('back.seller.index',compact('products'));
   }

   public function productpage()
   {
    $products = Product::orderBy('created_at','desc')->where('seller_id',null)->get();
      
      $categories =Category::all();
      $prosection = Prosection::all();

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

     response()->json("Product Page Says Ok..");

      return view('back.catalog.product.addproduct',compact('categories_dropdown','prosection','brands','products'));
   }

   public function attributeEdit(Attribute $attribute)
   {
    response()->json("ok");
    return view('back.catalog.product.editattribute',compact('attribute'));
    
   }
    public function attributeUpdate(Attribute $attribute,Request $request)
   {
           
    $attribute->stock = $request->stock;
    $attribute->size = $request->size;
    $attribute->sku =$request->color;
    $attribute->save();
    flash('attribute updated','success')->important();
    return redirect()->back();
   }

//    public function maincategory()
//    {
//     response()->json('ok');
//     return view('back.catalog.product.maincategory');
//    }
//    public function maincategoryUpdate(Productcategory $productcategory, Request $request)
//    {
//     $productcategory->productcategory =$request->productcategory;
//      $productcategory->save();
//      flash('product category updated successfully','success');
//      return redirect()->back();
//    }
//    public function maincategoryDelete(Productcategory $productcategory)
//    {
//     $productcategory->delete();
     
//      flash('product category deleted successfully','success');
//      return redirect()->back();
//    }

//    public function maincategoryStatus(Productcategory $productcategory,$status)
//    {
//     $productcategory->status =$status;
//     $productcategory->save();
//     flash('Status updated successfully','success');
//     return redirect()->back();
//    }

//    public function productcategoryData(Productcategory $productcategory)
//    {
//      $products =Product::where('productcategory_id',$productcategory->id)->get();
//      response()->json($products);
//      return view('back.catalog.product.productcategory',compact('products'));
//    }
   
   
   public function attributeDelete(Attribute $attribute)
   {
     $attribute->delete();
     flash('Data deleted successfully','success');
     return back();
   }

}
