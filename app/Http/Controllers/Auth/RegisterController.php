<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'=>['required','min:10'],
            'address'=>['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $data = $request->all();
        $user =new User();
        $user->name =$data['name'];
        $user->email =$data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->acc_type =$data['acc_type'];
        $user->address = $data['address'];
        $user->save();
        $user =User::where('email',$data['email'])->first();
          

          event(new Registered($user));
          $this->guard()->login($user);
        //  Mail::to($user->email)->send(new Verification($data));
         $notification =array('message','Please Check your email to verify your account !',
                               'alert-type','info');
        //   flash('Please Check your email to verify your account !','success')->important();
          // return $user;



        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'phone'=>$data['phone'],
        //     'address'=>$data['address'],
        //     'acc_type'=>$data['acc_type'],

        //     ]);
        // Mail::to($user->email)->send(new Verification($data));
        //   flash('Please Check your email to verify your account !','success')->important();
          return view('front.user.dashboard');
    }
}
