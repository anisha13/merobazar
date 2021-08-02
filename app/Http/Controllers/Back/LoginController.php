<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('back.login.show');
    }
    public function login(Request $request)
    {

        $credentials = $request->only('email','password');
    
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.home');
        }
        else{

            $notification =array("message" =>"Incorrect Email/Password",'alert-type' => 'error');
            
            return redirect()->route('admin.login')->with($notification);
        }
    }
    public function logout(Request $request){

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

    public function registerpage()
    {
        return view('auth.register');
    }
    public function redirect($provider)
    {
    
    return Socialite::driver($provider)->redirect();
    }
    public function Callback($provider){

        $userSocial =   Socialite::driver($provider)->stateless()->user();
            if(!empty($userSocial->getEmail()))
                  {
                    $email=$userSocial->getEmail();
                  }
                  else
                  {
        
                    $email =$userSocial->getId();
                  }
                
                $users       =   User::where(['email' => $email])->first();
        if($users){
                    Auth::login($users);
                    return redirect('/user');
                }else{
                  
        $user = User::create([
                        'name'          => $userSocial->getName(),
                        'email'         => $email,
                        // 'image'         => $userSocial->getAvatar(),
                        'provider_id'   => $userSocial->getId(),
                        'provider'      => $provider,
                        'password'      =>bcrypt('12345'),
                    ]);
                Auth::login($user);
                    return redirect('/user');
                }
            }
        
}
