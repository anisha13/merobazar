<?php

namespace App\Http\Controllers\Back;

use App\Companydetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function index()
    {
        $company =Companydetail::orderBy('created_at','desc')->first();
    	return view('back.company.index',compact('company'));
    }

    public function update(Companydetail $company,Request $request)
    {

   
      if(!empty($request->address))
      {
      	$company->address = $request->address;
         $address=str_replace(' ','',$request->address);
      $place=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key=AIzaSyDR6v2elDctrDptLyvTjpTBEs6z7CLSfW8');
       $add=json_decode($place);
      $company->latitude = $add->results[0]->geometry->location->lat;
      $company->longitude =$add->results[0]->geometry->location->lng;
      }
      if(!empty($request->phone))
      {
      	$company->phone = $request->phone;
      }
       if(!empty($request->websitecolor))
      {
        $company->websitecolor = $request->websitecolor;
      }
       if(!empty($request->dashboardcolor))
      {
        $company->dashboardcolor = $request->dashboardcolor;
      }
      if(!empty($request->termsofsale))
      {
        $company->termsofsale = $request->termsofsale;
      }
      if(!empty($request->privacy))
      {
        $company->privacy = $request->privacy;
      }
       if(!empty($request->email))
      {
      	$company->email = $request->email;
      }
       if(!empty($request->facebook))
      {
      	$company->facebook = $request->facebook;
      }
       if(!empty($request->youtube))
      {
      	$company->youtube = $request->youtube;
      }
       if(!empty($request->tweeter))
      {
      	$company->tweeter = $request->tweeter;
      }
       if(!empty($request->about))
      {
      	$company->about = $request->about;
      }

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

            $company->logo = $imagename;


        }

        $company->save();
       
      $notification =array('message'=>'Data saved successfully',
                            'alert-type'=>'success');
      return redirect()->back()->with($notification);
    }
}
