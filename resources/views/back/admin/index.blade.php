@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

<div class="container">

	<div class="row card">
    <div class="col-lg-12 p-3 ">
        
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;"><i class="fa fa-plus"></i>Add admin</button>
    </div>
</div>


<div class="row">
  <div class="col-lg-6">
    <button type="button" class="btn btn-info rounded-0 pl-2 pr-2 mt-2 pt-1 pb-1" data-toggle="modal" data-target="#roles">
  Add roles
</button>

<!-- Modal -->
<div class="modal fade" id="roles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       {{Form::open(['route'=>'role.store','method'=>'post'])}}
        <div class="form-group">
            <label>Role Name</label>
            <input type="text" name="role" class="form-control rounded-0" required="">
        </div>
         <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control rounded-0" required="">
        </div>
        <div>
            <h3>Select Permission</h3>
            <input type="checkbox" name="permission" value="all"> All
            <hr>
            <div class="row">
              @foreach($permissions as $permission)

              <div class="col-lg-3">
                 <input type="checkbox" name="permission[]" value="{{$permission->slug}},{{$permission->permission}}"> {{$permission->permission}} 
              </div>
               @endforeach
            </div>
            
            
           
           
             
        </div>
            
            <button class="btn btn-success rounded-0" type="submit">Submit</button>
        <div>
       {{Form::close()}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Slug</th>
      <th>Permission</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $roles =App\Role::where('id','!=','2')->get(); ?>

    @foreach($roles as $role)
    <tr>
      <th scope="row">1</th>
      <td>{{$role->name}}</td>
      <td>{{$role->slug}}</td>
      <?php $rolepermission =App\Rolepermission::where('role_id',$role->id)->get(); ?>
      <th>
        
        @foreach($rolepermission as $rolper)
    
        <span class="badge badge-warning">{{$rolper->permissiontitle}}</span>,
        @endforeach

      </th>
      <td>
         <a href="#"><i class="fa fa-edit" data-toggle="modal" data-target="#edit-{{$role->id}}"></i></a>
         

         <div class="modal fade" id="edit-{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Roles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       {{Form::open(['route'=>['role.update',$role->id],'method'=>'patch'])}}
        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control rounded-0" required="" value="{{$role->name}}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control rounded-0" required="" value="{{$role->slug}}">
        </div>
           <input type="checkbox" name="permission" value="all"> All
            <hr>
            <div class="row">
              <?php $rolepermission =App\Rolepermission::where('role_id',$role->id)->get() ?>
             
              @foreach($permissions as $permission)
                 
              <div class="col-lg-3">

                 <input type="checkbox" name="permission[]" value="{{$permission->slug}},{{$permission->permission}}"> {{$permission->permission}} 
              </div>
               @endforeach
            </div>
            <button class="btn btn-success rounded-0" type="submit">Submit</button>

        <div>
       {{Form::close()}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</div>






        <a href="{{route('role.delete',$role->id)}}"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

  </div>

  <div class="col-lg-6" style="display:none;">

<button type="button" class="btn btn-info rounded-0" data-toggle="modal" data-target="#permission">
  Add Permission
</button>

<!-- Modal -->
<div class="modal fade" id="permission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Permission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       {{Form::open(['route'=>'permission.store','method'=>'post'])}}
        <div class="form-group">
            <label>Permission</label>
            <input type="text" name="permission" class="form-control rounded-0" required="">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control rounded-0" required="">
        </div>
            <input type="hidden" name="guard" value="admin">
            <button class="btn btn-success rounded-0" type="submit">Submit</button>
        <div>
       {{Form::close()}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</div>
    <table class="table table-responsive table-sm">
  <thead class="thead-dark ">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Slug/Url</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
   <?php $i=1; ?>
    @foreach($permissions as $permission)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$permission->permission}}</td>
      <td>{{$permission->slug}}</td>
      <td><a href="{{route('permission.delete',$permission->id)}}"><i class="fa fa-trash"></i></a></td>
    </tr>
    @endforeach

  </tbody>
</table>
  </div>
</div>
   


</div>
<div class="row">
        <div class="col-md-12 mb-5">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                  	<th>S.N.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($admins =App\Admin::where('id','!=','1')->where('id','!=',auth()->user()->id)->get())
                	@php($i=1)
                	@foreach($admins as $admin)
                  <tr>
                  	<th>{{$i++}}</th>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->contact}}</td>
                    <td>{{$admin->address}}</td>
                    <td>{{$admin->image}}</td>
                    <td>{{$admin->roles}}</td>
                    <th>
                      <!-- <button class="admin-edit" data-slug="{{$admin->id}}" style="color:blue"><i class="fa fa-edit"></i></button> -->
                      <a href="{{route('admin.delete',$admin->id)}}" data-slug="{{$admin->id}}" style="color:red;"><i class="fa fa-trash"></i></a>
                    </th>
                    
                  </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admins</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <div class="container">
        {{Form::open(['method'=>'post','route'=>'admins.store','enctype'=>'multipart/form-data'])}}

  <div class="form-row">
    <div class="form-group col-md-6">
     
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
                   
    </div>
    <div class="form-group col-md-6">
      <label>E-mail</label>
      <input type="email" name="email" class="form-control" required>
    </div>
  </div>
   <div class="form-group">
                        <label for="exampleFormControlSelect1">Roles</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="roles">
                            @foreach($roles as $role)
                            <option value="{{$role->slug}}">{{$role->name}}</option>
                            @endforeach
                            

                        </select>
                    </div>
  <div class="form-group">
   <label>Address</label>
   <textarea class="form-control" name="address"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
       <label for="password_confirmation">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group col-md-6">
       <label for="password_confirmation">Confirm Password</label>
       <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">   
     </div>
     <div class="row">
     <div class="form-group col-md-6">
     	 <label>Contact</label>
         <input type="text" name="contact" class="form-control" required>
     </div>
     <div class="form-group col-md-6">
     	<label>Upload Image</label>
       <input type="file" name="image" class="">
         </div>
     </div>
 
  </div>
  <button type="submit" class="btn btn-primary" style="border-radius:0px;">Add Admin</button>
{{Form::close()}}
       </div>
 
      </div>
     
    </div>
  </div>
</div>


</section>
</div>



@include('back.includes.footer')