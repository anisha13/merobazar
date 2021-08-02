<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Socialmedia;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SocialmediaController extends Controller
{
    public function index()
    {
         $socialmedia = Socialmedia::all();
        return view('back.socialmedia.index',compact('socialmedia'));
    }

    public function store(Request $request)
    {
        $socialmedia = new Socialmedia;
        $socialmedia->name = $request->name;
        $socialmedia->url = $request->slug;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time() . $image->getClientOriginalName();
            $destinationpath = 'public/images/'.$imagename;

            Image::make($image)->resize(519, 324, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationpath);


            $socialmedia->image = $imagename;


        }
        $socialmedia->save();

           $notificaton=array('message'=>'Socialmedia Added Successfully' ,'alert-type'=>'success');

            return redirect()->back()->with($notificaton);

    }
    public function delete(Brand $socialmedia)
    {
        if(!$socialmedia->image==null){
            $image = $socialmedia->image;
            unlink('public/images/'.$image);
        }
        $socialmedia->delete();
        $notificaton=array('message'=>'Brand Deleted Successfully' ,'alert-type'=>'success');

        return redirect()->back()->with($notificaton);
    }


    public function edit(Brand $socialmedia)
    {
        return view('back.catalog.brand.edit',compact('brand'));
    }

    public function update(Request $request , Socialmedia $socialmedia)
    {

             
        $socialmedia->name = $request->name;
        $socialmedia->url = $request->slug;
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

            $socialmedia->image = $imagename;


        }


        $socialmedia->save();
        $notificaton=array('message'=>'Brand Updated Successfully' ,'alert-type'=>'success');


        return redirect()->back()->with($notificaton);
    }
    public function status(Socialmedia $socialmedia,$status)
    {
          $socialmedia->status =$status;
          $socialmedia->save();
          $notification = array('message'=>'Status Changed successfully','alert-type'=>'success');
          return redirect()->back()->with($notification);
    }
}
