<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'cat_id',
     ];
 
     public function attributes()
     {
         return $this->hasMany('App\Attribute');
     }
     public function galleries()
     {
         return $this->hasMany('App\Gallery');
     }
      public function vendoruser()
     {
         return $this->belongsTo('App\Vendoruser','vendor','id');
     }
     public function productcategory()
     {
         return $this->belongsTo('App\Productcategory');
     }
}
