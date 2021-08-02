<?php

namespace App\Http\Controllers\Back;

use App\Admanagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    public function index()
    {
        $sliders = Admanagement::orderBy('created_at','desc')->get();
        return view('back.ads.index',compact('sliders'));
    }

    public function store(Request $request)
    {



        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $originalname = time() . '' . $image->getClientOriginalName();
                $destination = 'public/images/';
                $image->move($destination,$originalname);
                $ads = new Admanagement;
                $ads->image = $originalname;
                $ads->url =$request->url;
                $ads->setlocation = $request->title;
                $ads->save();

                }


           $notification =array('message'=>'Ads Uploaded Successfully',
                                'alert-type'=>'success');
            return back()->with($notification);


        }
    }
    public function delete(Admanagement $ads)
    {
        if($ads->image != null){
            unlink('public/images/'.$ads->image);
        }
        $ads->delete();

        $notification =array('message'=>'Ads Deleted Successfully',
                                'alert-type'=>'success');
            return back()->with($notification);
    }
    public function status(Admanagement $ads,$status)
    {
        $ads->status = $status;
        $ads->save();
        $notification =array('message'=>'Status Changed',
                                'alert-type'=>'success');
            return back()->with($notification);
    }
}

