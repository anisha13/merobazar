<?php

namespace App\Http\Controllers\Back;

use App\Role;
use App\Permission;
use App\Rolepermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function store(Request $request)
    {
    	$lisofpermission =$request->permission;
         
         $role = new Role;
         $role->name =$request->role;
         $role->slug =$request->slug;
          $role->save();
         $permission = new Permission;

         if($lisofpermission == "all")
         {
            $rolepermission =new Rolepermission;
            $rolepermission->role_id = $role->id;
            $rolepermission->permission ="All";
            $rolepermission->permissiontitle ="All";
           
            $rolepermission->save();
              return redirect()->back();
         }
         foreach ($lisofpermission as  $permission) {
            
            $permission =explode(',', $permission);
               
         	$rolepermission =new Rolepermission;
            $rolepermission->role_id = $role->id;
            $rolepermission->permission = $permission[0];
            $rolepermission->permissiontitle = $permission[1];
           
            $rolepermission->save();
         }
        
         return redirect()->back();
    }

     public function update(Role $role,Request $request)
    {
        $lisofpermission =$request->permission;
         
            
        $role->name =$request->role;
         $role->slug =$request->slug;
          // $role->save();
         Rolepermission::where('role_id',$role->id)->delete();
         $permission = new Permission;

          if($lisofpermission == "all")
          {
            $rolepermission =new Rolepermission;
            $rolepermission->role_id = $role->id;
            $rolepermission->permission = "all";
            $rolepermission->permissiontitle = "All";
            $rolepermission->save();
            return redirect()->back();

          }
         foreach ($lisofpermission as  $permission) {
            
            $permission =explode(',', $permission);
            
            $rolepermission =new Rolepermission;
            $rolepermission->role_id = $role->id;
            $rolepermission->permission = $permission[0];
            $rolepermission->permissiontitle = $permission[1];
           
            $rolepermission->save();
         }
        
         return redirect()->back();
    }

    public function delete(Role $role)
    {
        Rolepermission::where('role_id',$role->id)->delete();
         
        $role->delete();

        flash('role deleted','success');
        return redirect()->back();
    }
}
