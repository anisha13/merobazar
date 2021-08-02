<?php

namespace App\Http\Controllers\Back;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
   public function store(Request $request)
   {
   	
   	 $permission = new Permission;
         $permission->permission =$request->permission;
         $permission->slug =$request->slug;
         $permission->save();

         return redirect()->back();
   }

   public function delete(Permission $permission)
   {
      $permission->delete();
      flash('data deleted','success');
      return redirect()->back();

   }
}
