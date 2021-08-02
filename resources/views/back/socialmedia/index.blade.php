@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">
            <div class="row card rounded-0">
                <div class="col-lg-12 p-2 ">
                    <span style="font-size:20px;">Social Media</span>
                    <button class="btn btn-info float-right pt-1 pb-1 pl-2 pr-2" data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;"><i class="fa fa-plus"></i> Add Social media</button>
                </div>
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
                                    <th>Image</th>
                                    <th>Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($socialmedia as $brand)
                               
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th>{{$brand->name}}</th>
                                    <th><img src="{{asset('/images/'.$brand->image)}}" height="30"></th>
                                    <th>{{$brand->url}}</th>
                                    <th>
                                    @if($brand->status=="1")
                                        <a href="{{route('socialmedia.status',[$brand->id,'0'])}}" class="btn btn-link"><span class="badge badge-success">Active</span></a>
                                        @else
                                        <a href="{{route('socialmedia.status',[$brand->id,'1'])}}" class="btn btn-link"><span class="badge badge-warning">Deactive</span></a>
                                        @endif
                                    </th>
                                    <th>
                                        <a href="#" data-toggle="modal" data-target="#editbrand-{{$brand->id}}" style="border-radius:0px;" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                                        <div class="modal fade" id="editbrand-{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Socialmedia</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="container">
                                                            {{Form::open(['method'=>'patch','route'=>['socialmedia.update',$brand->id],'enctype'=>'multipart/form-data'])}}

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">

                                                                    <label>Name</label>
                                                                    <input type="text" name="name" class="form-control" required value="{{$brand->name}}">

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Url</label>
                                                                    <input type="text" name="slug" class="form-control" required value="{{$brand->url}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img src="{{asset('/images/'.$brand->image)}}" height="40">
                                                                    <input type="hidden" name="oldfile" value="{{$brand->image}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Image</label>
                                                                    <input type="file" name="image" class=" form-control-file" >
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-info pt-1 pb-1" style="border-radius:0px;">Update Socialmedia</button>
                                                            {{Form::close()}}
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>




                                        <a href="{{route('socialmedia.delete',$brand->id)}}" style="color:red" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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