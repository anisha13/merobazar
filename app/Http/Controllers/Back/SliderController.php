<?php

namespace App\Http\Controllers\Back;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at','desc')->get();
        return view('back.slider.index',compact('sliders'));
    }

    public function store(Request $request)
    {



        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $originalname = time() . '' . $image->getClientOriginalName();
                $destination = 'public/images/' . $originalname;
                Image::make($image)->resize(973,390)->save($destination);
                $sliders = new Slider;
                $sliders->image = $originalname;
                $sliders->title = $request->title;
                $sliders->save();

                }


            flash('seccessfull uploaded', 'success');
            return back();


        }
    }
    public function delete(Slider $slider)
    {
        if($slider->image != null){
            unlink('public/images/'.$slider->image);
        }
        $slider->delete();

        flash('Image deleted','success');
        return redirect()->back();
    }
    public function status(Slider $slider,$status)
    {
       
        $slider->status = $status;
        $slider->save();
  
        flash('Status Changed','success');
        return redirect()->back();
    }
}

