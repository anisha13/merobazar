<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins= Admin::where('id','!=',auth('admin')->id())->get();
        $permissions =Permission::all();
        return view('back.admin.index',compact('admins','permissions'));
    }

    public function RegestrationForm()
    {
        return view('back.admin.addadmin');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'name'=>'required',

            'email'=>'required | unique:admins',
            'password'=>'required | confirmed',


        ]);

        if($request->hasFile('image')){

            $admins = new Admin;
            $image = $request->file('image');
            $imagename =$image->getClientOriginalName();
            $dbimagename = time().$imagename;
            $destinationpath = 'public/images/';
            $image->move($destinationpath,$dbimagename);
            $admins->image = $dbimagename;
            $admins->name = $request->name;
            $admins->roles =$request->roles;
            $admins->email =$request->email;
            $admins->password =bcrypt($request->password);
            $admins->contact =$request->contact;
            $admins->address = $request->address;
            $admins->save();
            flash('admin added successfully','success');
            return redirect()->back();
        }
        else{
            $admins = new Admin;
            $admins->name = $request->name;
            $admins->email =$request->email;
            $admins->roles =$request->roles;
            $admins->password =bcrypt($request->password);
            $admins->contact =$request->contact;
            $admins->address = $request->address;
            $admins->save();
            flash('admin added successfully','success');
            return redirect()->back();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Admin $admin)
    {
        if($admin->image != null){
            $destinationpath = 'public/images/';
            $image =$admin->image;
            unlink($destinationpath.$image);
            $admin->delete();
             flash('record deleted successfully','success')->important();
           return redirect()->back();
            
        }
        else{
            $admin->delete();
        flash('record deleted successfully','success')->important();
           return redirect()->back();
        }
    }
}
