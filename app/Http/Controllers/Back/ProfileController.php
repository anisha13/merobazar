<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');

    }
    public function ChangePassword()
    {


        return view('back.login.changepassword');
    }
    public function EditProfile()
    {
        $user = auth('admin')->user();

        return view('back.login.editprofile',compact('user'));
    }
    public function update(Request $request)

    {

        $this->validate($request,[
            'name'=>'required'
        ]);
        if($request->hasFile('image')){
            $user = auth('admin')->user();
            $image = $request->file('image');
            $imagename=time().$image->getClientOriginalName();

            $destinationpath = 'images/';
            if($request->old_image == null){
                $image->move($destinationpath,$imagename);
                $user->name = $request->name;
                $user->contact =$request->contact;
                //$user->roles =$request->roles;
                $user->address =$request->address;
                $user->image =$imagename;
                $user->save();
                $notificatoin=array('message'=>'Profile Updated Successfully','alert-type'=>'success');
            
                return back()->with($notificatoin);
            }
            else{
                unlink($destinationpath.$request->old_image);


                $image->move($destinationpath,$imagename);
                $user->name = $request->name;
                $user->contact =$request->contact;
                //$user->roles =$request->roles;
                $user->address =$request->address;
                $user->image =$imagename;
                $user->save();
                $notificatoin=array('message'=>'Profile Updated Successfully','alert-type'=>'success');
                return back()->with($notificatoin);
            }
        }
        else{
            $user = auth('admin')->user();

            $user->name = $request->name;
            $user->contact =$request->contact;
            $user->address =$request->address;
            $user->save();
            $notificatoin=array('message'=>'Profile Updated Successfully','alert-type'=>'success');
             return back()->with($notificatoin);
        }

    }

    public function UpdatePassword(Request $request)
    {


        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);

        $user= auth('admin')->user();

        if(!password_verify($request->old_password,$user->password)){

            $notificatoin=array('message'=>'Incorrect Old password','alert-type'=>'error');
            return redirect()->route('admin.changepassword')->with($notificatoin);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notificatoin=array('message'=>'Password Changed Successfully','alert-type'=>'success');
        return redirect()->back()->with($notificatoin);

    }
}
