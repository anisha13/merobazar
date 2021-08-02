@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

@php($users =App\User::orderBy('created_at','desc')->get())
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">
            <div class="row card rounded-0">
                <div class="col-lg-12 p-2 ">
                    <span style="font-size:20px;">Customers (Users)</span>
                    
            </div>

        </div>
        <div class="container-fluid">
        <div class="row card rounded-0">
            <div class="col-md-12 p-3">
                <div class="tile">
                    <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    
                                    <th>Phone</th>
                                    <th>status</th>
                                    <th>Account_type</th>
                                    <th>Verified/unverified</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($users as $user)
                               
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th>{{$user->name}}</th>
                                    
                                    <th>{{$user->phone}}</th>
                                    <th>{{$user->status}}</th>
                                    <th>{{$user->acc_type}}</th>
                                    <th>
                                     @if($user->verify == '1')
                                     <span class="badge badge-success p-2">Verifird</span>
                                     @else
                                     <span class="badge badge-warning p-2">UnVerifird</span>
                                     @endif
                                    </th>
                                    <th><img src="{{asset('public/images/'.$user->image)}}" height="30"></th>
                                    
                                    
                                   <th>
                                   @if($user->acc_type =="seller")                                   <!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#usercomment-{{$user->id}}">
 Comment
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="usercomment-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          {{Form::open(['route'=>'completeprofile','method'=>'post'])}}
          <input type="hidden" name="user_id" value="{{$user->id}}">
        <textarea name="comment" class="form-control">{{$user->comment}}</textarea>
        <button class="btn btn-info rounded-0 btn-sm mt-1">Submit</button>
        {{Form::close()}}
      </div>
      
    </div>
  </div>
</div>
   @if($user->acc_type =="seller")                                   <!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#user-{{$user->id}}">
 view
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="user-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p>Name : {{$user->name}}</p>
         <p>Email : {{$user->email}}</p>
         <p>Phone : {{$user->phone}}</p>
         <p>Address : {{$user->address}}</p>
         <p>AccType : {{$user->acc_type}}</p>
      </div>
      
    </div>
  </div>
</div>
                                       <a href="{{route('users.delete',$user->id)}}" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                   </th>
                                </tr>
                             
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        




        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Social Media</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            {{Form::open(['method'=>'post','route'=>'socialmedia.store','enctype'=>'multipart/form-data'])}}

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control get-slug" required placeholder="facebook">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Url</label>
                                    <input type="text" name="slug" class="form-control" required id='slug'>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image" class=" form-control-file" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="border-radius:0px;">Save Brand</button>
                            {{Form::close()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </section>
</div>


@include('back.includes.footer')