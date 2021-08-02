<?php

namespace App\Http\Controllers\Back;
use App\Category;
// use App\Prosection;
// use App\Productcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories =Category::all();
        // $prosection = Prosection::all();

        $categor = Category::where(['parent_id'=>0])->get();

            $categories_dropdown ="";

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

            
    	return view('back.catalog.category.index',compact('categories','categories_dropdown'));
    }

    public function store(Request $request)
    {
        
       
    	 $categories = new Category;
        $categories->name = $request->category;
        if(empty($request->parent))
        {
        	$categories->parent_id =0;
        }
        else
        {
        	$categories->parent_id =$request->parent;
        }
        
        $categories->url = $request->slug;
         if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);


            $categories->image = $imagename;


        }
        $categories->save();
        $notification = array('message'=>'Category added successfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    
    
    
    public function update(Category $category,Request $request)
    {
       
       
       $oldimage = $request->oldfile;
        if($request->parent =="Select Parent" )
        {
        	$category->parent_id =0;
        }
        else
        {
        	$category->parent_id =$request->parent;
        }
        $category->name = $request->category;
        $category->url = $request->slug;
         if ($request->hasFile('image')) {

            $image = $request->file('image');
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

            $category->image = $imagename;


        }
        
        $category->save();
        $notification = array('message'=>'Category added successfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
       
    }
    
    

    public function delete(Category $category)
    {
        $categories = Category::where('parent_id',$category->id)->get();
        foreach ($categories as $value) {
           $value->delete();
        }

          $category->delete();
          $notification = array('message'=>'Record Deleted successfully','alert-type'=>'success');
          return redirect()->back()->with($notification);
    }

    // public function productcategory(Request $request)
    // {
    //     $productcategory = new Productcategory;
    //     $productcategory->productcategory =$request->productcategory;
    //     $productcategory->save();
    //     flash('category saved successfully','success')->important();
    //     return redirect()->back();
    // }

    public function status(Category $category,$status)
    {
          $category->status =$status;
          $category->save();
          $notification = array('message'=>'Status Changed successfully','alert-type'=>'success');
          return redirect()->back()->with($notification);
    }
}

