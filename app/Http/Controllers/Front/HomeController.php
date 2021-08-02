<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Message;
use App\User;
use App\Brand;

class HomeController extends Controller
{
    
 public function index()
 {
     return view('front.index');
 }   
 public function manageprofile()
 {
  return view('front.profile.index');
 }
  public function product(Category $category)
    {
    
      $products =Product::where('maincat_id',$category->id)->paginate(20);
      return view('front.product',compact('products'));
    }

 public function myproduct()
 {
  return view('front.myproduct.myproduct');
 }
 public function productpage($value)
    {
       $productcayegory =Brand::where('id',$value)->first();
       $name =$productcayegory->name;
       
      $products =Product::orderBy('updated_at','desc')->where('status','1')->where('verification','1')->where('brand',$name)->paginate(20);
      
      return view('front.product',compact('products','name'));
    }

 public function mywishlist()
 {
  return view('front.mywishlist.wishlist');
 }
 public function addimages($id, Request $request)
 {
  $product =Product::where('id',$id)->first();
  return view('front.myproduct.addimage',compact('product'));
 }
 public function questionsend(Request $request)
 {
     
    $question =new Message();
    $question->name =$request->name;
    $question->email = $request->email;
    $question->message = $request->message;
    $question->product_id =$request->product_id;
    
    
    if(!empty($request->vendor_id))
    {
       $question->vendor_id = $request->vendor_id;
    }
     $question->save();
     $notification =array('message'=>'Thank you for the message',
                            'alert-type'=>'success');
     return back()->with($notification);
  
 }
 public function productCategory(Category $category)
    {
           $cat=$category;
           $name =$cat->name;
            $products =Product::orderBy('updated_at','desc')->where('status','1')->where('verification','1')->where('cat_id',$category->id)->paginate(20);
            return view('front.product',compact('products','cat','name'));
    }


    public function user()
    {
        return view('back.user.index');
    }
    public function delete(User $user)
    {
        if(!$user->image==null){
            $image = $user->image;
            unlink('images/'.$image);
        }
        $user->delete();
        $notificaton=array('message'=>'User Deleted Successfully' ,'alert-type'=>'success');

        return redirect()->back()->with($notificaton);
    }

    public function about()
    {
      return view('front.about');
    }
    public function career()
    {
      return view('front.new.career');
    }
    public function returnprocess()
    {
      return view('front.return');
    }
    public function privacypolicy()
    {
      return view('front.privacy');
    }
    public function termsofsale()
    {
      return view('front.termsofsale');
    }

    public function category()
 {
     return view('front.category');
 }

 public function fingerprint($uid)
 {
     
    $counters =Counter::all();

    foreach ($counters as $cou) {
         $cdate =date('Y-m-d');
       
         $date =$cou->created_at->format('Y-m-d');
     
      if($cou->uid == $uid && $date == $cdate)
      {
     
       return response()->json("user already exists");
      }
     
    }
     $counter =new Counter;
     $counter->uid =$uid;
     $counter->save();
     return response()->json($uid);
    

     
 }

 public function completeProfile(Request $request)
 {
  
    $user =User::where('id',$request->user_id)->first();
    $user->comment = $request->comment;
    $user->save();
    $notification =array('message'=>'Comment Saved',
                              'alert-type'=>'success');
    return back()->with($notification);
 }


}
