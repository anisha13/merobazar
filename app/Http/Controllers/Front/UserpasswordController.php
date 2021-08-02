<?php

namespace App\Http\Controllers\Front;

use App\User;
use App\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\Verification;
use Laracasts\Flash\Flash;

class UserpasswordController extends Controller
{
    public function store(Request $request)
    {      
           
           

            $users =auth()->user();
            $user =User::find($users->id);
            $user->name = $request->name;
            // $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address =$request->address;
          
            $oldimage = $request->oldfile;
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

            $user->image = $imagename;

        }
        $user->save();
        $notification =array('message'=>'Profile Updated successfully',
                                 'alert-type'=>'success');
       return back()->with($notification);
    }

    public function change (Request $request,$user)
    {

        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);
        $users= User::find($user);

        if(!password_verify($request->old_password,$users->password)){

            $notification =array('message'=>'Incorrect old password',
            'alert-type'=>'warning');
return back()->with($notification);
        }
        $users->password = bcrypt($request->password);
        $users->save();
        $notification =array('message'=>'Password updated successfully',
        'alert-type'=>'success');
return back()->with($notification);
    }

    public function verifyUser($userid)
    {
     
      $user = User::where('id',$userid)->first();
     if(!empty($user))
     {
      if($user->verify =="1")
      { 
        //   $notification =array('message'=>'Your email is already verified',
        //                          'alert-type'=>'success');
      flash('Your email is already verified','warning')->important();
      return view('auth.login');
      }
      $user->verify ='1';
      $user->save();
    //   $notification =array('message'=>'Email is verified now you can login your account',
    //                              'alert-type'=>'success');
         flash('Email is verified now you can login your account','success')->important();
      return view('auth.login');
    }
  
  else{
    // $notification =array('message'=>'Incorrect Verification Link please resend verification link',
    // 'alert-type'=>'success');
    flash('Incorrect Verification Link please resend verification link','success')->important();
      return view('auth.login');
  }


}

public function adminrecovery(Request $request)
    {
    
      $admins =Admin::all();
      foreach ($admins as $admin) {
        if($admin->email == $request->email)
        {
            $user = Admin::where('email',$request->email)->first();
      $password= rand();
       $user->password =bcrypt($password);
       $user->save();
        if (! empty($user))
      {
          $data = array(
              'password' => $password,
              'email'=>$user->email,
          );
          Mail::to($user->email)->send(new SendEmail($data));
         $notification=array('message'=>'please chceck your email',
                               'alert-type'=>'success');
 
          return back()->with($notification);
      }
    
        }
      }
     
        
//       $notification=array('message'=>'Incorrect Email email',
//       'alert-type'=>'success');
// return back()->with($notification);
flash('Incorrect Email email','warning')->important();
          return back();
      


    }

    public function recovery(Request $request)
    {
         $this->validate($request,[
             'email' => 'required',
      ]);
   
   
      $user = User::where('email',$request->email)->first();
      if(empty($user))
      {
        // $notification=array('message'=>'Incorrect Email email try again',
        // 'alert-type'=>'success');
        flash('Incorrect Email email try again','warning');
          return view('auth.login');
      }
      $password= rand();
      
       $user->password =bcrypt($password);
       $user->save();
     
      if (! empty($user))
      {
          $data = array(
              'password' => $password,
              'email'=>$user->email,
          );
          Mail::to($user->email)->send(new SendEmail($data));
        //   $notification=array('message'=>'Please check your email to recover Password',
        //                     'alert-type'=>'success');
        //                     session()->set('notification',$notification);
        flash('Please check your email to recover Password','success')->important();
          return view('auth.login');

      }
      else
      {
        // $notification=array('message'=>'Incorrect Email email try again',
        // 'alert-type'=>'success');
        //   return view('auth.login')->with($notification);
        flash('Incorrect Email email try again','warning')->important();
          return view('auth.login');
      }


    }
    public function emailVerify(Request $request)
    {

      $users =User::all();
      foreach ($users as $user) {
        if($user->email == $request->email)
        {
          $userid = $user->id;
          $number =rand();
          $data=array(
            'userid'=>$userid,
            'number'=>$number,
          );
         Mail::to($user->email)->send(new Verification($data));
        //  $notification=array('message'=>'Please check your email to verify your account',
        //  'alert-type'=>'success');
        //    return view('auth.login')->with($notification);
        flash('Please check your email to verify your account','success');
          return view('auth.login');
        }
       
      }
      
    }


}
