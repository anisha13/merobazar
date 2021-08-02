<?php

namespace App\Http\Controllers\Front;

use App\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Wishlistcontroller extends Controller
{
    public function store($id)
    {
        
    	
    	$wishlist =new Wishlist;
    	$wishlistss =Wishlist::all();
         
    	foreach($wishlistss as $wishlists)
    	{
    	    
    	    
    	    if($wishlists->product_id == $id && $wishlists->user_id == auth()->user()->id)
    	    {
    	            $notification = array(
                'message' => 'Product  already  exist', 
                'alert-type' => 'error'
            );
    	       
    	        
    	return back()->with($notification);
    	    }
    	    
    	}
    	$notification = array(
                'message' => 'Product is added to wishlist', 
                'alert-type' => 'success');
    	
    	$wishlist->user_id = auth()->user()->id;
    	$wishlist->product_id =$id;
    	$wishlist->save();
    	
    	return back()->with($notification);
return back()->with($notification);
    }
    public function delete($id)
    {
    	$wishlist =Wishlist::where('product_id',$id)->where('user_id',auth()->user()->id)->get();
    	foreach ($wishlist as $wish) {
    		
    		$wish->delete();
    	}
        
        $notification =array('message'=>'Product removed from wishlist',
        'alert-type'=>'success');
return back()->with($notification);
    	

    }
}
