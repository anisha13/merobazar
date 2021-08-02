<?php

namespace App\Http\Controllers\Back;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function indexbrand()
    {
         $brands = Brand::all();
        return view('back.catalog.brand.index',compact('brands'));
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->brand;
        $brand->slug = $request->slug;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'public/images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);


            $brand->image = $imagename;


        }
        $brand->save();

           $notificaton=array('message'=>'Brand Added Successfully' ,'alert-type'=>'success');

            return redirect()->back()->with($notificaton);

    }
    public function delete(Brand $brand)
    {
        if(!$brand->image==null){
            $image = $brand->image;
            unlink('public/images/'.$image);
        }
        $brand->delete();
        $notificaton=array('message'=>'Brand Deleted Successfully' ,'alert-type'=>'success');

        return redirect()->back()->with($notificaton);
    }


    public function edit(Brand $brand)
    {
        return view('back.catalog.brand.edit',compact('brand'));
    }

    public function update(Request $request , Brand $brand)
    {


        $brand->name = $request->brand;
        $brand->slug = $request->slug;
        $oldimage = $request->oldfile;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
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

            $brand->image = $imagename;


        }


        $brand->save();
        $notificaton=array('message'=>'Brand Updated Successfully' ,'alert-type'=>'success');


        return redirect()->back()->with($notificaton);
    }

//   public function branddata(Brand $brand)
//   {
    
//     $brands= Brand::where('name',$brand->name)->first();
    
//    $products = Product::where('brand_id',$brands->id)->paginate(18);
//     return view('front.new.product',compact(['products']));
//   }

public function status(Brand $brand,$status)
{
    $brand->status =$status;
    $brand->save();
    $notificaton =array('message'=>'Status Changed','alert-type'=>'success');
    return back()->with($notificaton);
}

}
