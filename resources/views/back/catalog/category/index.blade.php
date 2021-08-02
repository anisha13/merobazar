@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">
            <div class="row card rounded-0">
                <div class="col-lg-12 pt-2 ">
                   <span style="font-size: 20px !important;">Categories</span>
                    <button class="btn btn-info rounded-0 float-right" data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;"><i class="fa fa-plus"></i> Add category</button>
                </div>
            </div>





        </div>
        <div class="container-fluid mt-2">
        <div class="row card rounded-0 ">
            <div class="col-md-12 pt-3">
                <div class="tile">
                    <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Parent_ID</th>
                                    <th>Url</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($categories as $category)
                                @if($category->id == '27')
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th>{{$category->name}}</th>
                                    <th>{{$category->id}}</th>
                                    <th>{{$category->parent_id}}</th>
                                    <th>{{$category->url}}</th>

                                    <th><img src="{{asset('/images/'.$category->image)}}" height="30"></th>
                                    <th>
                                        @if($category->status=="1")
                                        <a href="{{route('cat.status',[$category->id,'0'])}}" class="btn btn-link"><span class="badge badge-success">Active</span></a>
                                        @else
                                        <a href="{{route('cat.status',[$category->id,'1'])}}" class="btn btn-link"><span class="badge badge-warning">Deactive</span></a>
                                        @endif
                                    </th>
                                    <th>
                                        <!-- <a href="{{route('cat.delete',$category->id)}}" ><i class="fa fa-trash"></i></a> -->
                                    </th>
                                </tr>
                                @else
                                <tr>
                                    <th>{{$i++}}</th>
                                    <th>{{$category->name}}</th>
                                    <th>{{$category->id}}</th>
                                    <th>{{$category->parent_id}}</th>
                                    <th>{{$category->url}}</th>

                                    <th><img src="{{asset('/images/'.$category->image)}}" height="30"></th>
                                    <th>
                                        @if($category->status=="1")
                                        <a href="{{route('cat.status',[$category->id,'0'])}}" class="btn btn-link"><span class="badge badge-success">Active</span></a>
                                        @else
                                        <a href="{{route('cat.status',[$category->id,'1'])}}" class="btn btn-link"><span class="badge badge-warning">Deactive</span></a>
                                        @endif
                                    </th>
                                    <th>

                                        <!-- Button trigger modal -->
                                        <a type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#editcategory-{{$category->id}}" data-placement="top" title="Edit Category">
                                            <i class="fa fa-edit"></i>
                                       </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editcategory-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            {{Form::open(['method'=>'patch','route'=>['category.update',$category->id],'enctype'=>'multipart/form-data'])}}

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">

                                                                    <label>Category</label>
                                                                    <input type="text" name="category" class="form-control" value="{{$category->name}}" required>

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    @php($parent = App\Category::where('id',$category->parent_id)->first())
                                                                    <label>Select Parent</label>
                                                                    <select name="parent" class="form-control">
                                                                        @if(!empty($parent))
                                                                        <option selected value="{{$parent->id}}">{{$parent->name}}</option>
                                                                        @else
                                                                        <option selected>Select Parent</option>
                                                                        @endif

                                                                        {!! $categories_dropdown !!}

                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Url</label>
                                                                    <input type="text" name="slug" class="form-control" required value="{{$category->url}}">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <img src="{{asset('/images/'.$category->image)}}" height="20">
                                                                    <input type="hidden" value="{{$category->image}}" name="oldfile">
                                                                    <label>Image</label>
                                                                    <input type="file" name="image" class="form-control">
                                                                </div>




                                                            </div>

                                                            <button type="submit" class="btn btn-primary" style="border-radius:0px;">Update Category</button>
                                                            {{Form::close()}}
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('cat.delete',$category->id)}}" class="btn btn-link p-1" data-toggle="tooltip" title="Delete Product"><i class="fa fa-trash"></i></a>
                                    </th>
                                </tr>
                                @endif
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            {{Form::open(['method'=>'post','route'=>'category.store','enctype'=>'multipart/form-data'])}}

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label>Category</label>
                                    <input type="text" name="category" class="form-control" required>

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Select Parent</label>
                                    <select name="parent" class="form-control">
                                         <option value="0">Select Category</option>
                                        {!! $categories_dropdown !!}

                                    </select>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Url</label>
                                    <input type="text" name="slug" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>




                            </div>

                            <button type="submit" class="btn btn-primary" style="border-radius:0px;">Add Category</button>
                            {{Form::close()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </section>
</div>


@include('back.includes.footer')