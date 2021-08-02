@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')



<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;">Products
                <button class="btn btn-default p-2 mt-0 rounded-0" data-toggle="modal" data-target="#addProduct" style="float:right; background-color:#002f34 !important"><i class="fa fa-plus"></i> Add Product</button> </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 pt-3">
            <div class="tile">
                <div class="tile-body">
                    <table id="myTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>

                                <th>S.N</th>
                                <th>name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Thumbnail</th>
                                <th>Verified/unverified</th>
                                <th>Activate/deactivate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @php($products =App\Product::where('seller_id',auth()->user()->id)->get())
                            @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->brand}}</td>
                                @php($category =App\Category::where('id',$product->cat_id)->first())
                                <td>{{$category->name}}</td>
                                <td>{{$product->color}}</td>

                                <td>{{$product->price}}</td>
                                <td><img src="{{asset('images/'.$product->thumbnail)}}" height="30"></td>
                                <td class="text-center">
                                    @if($product->status == 0)
                                    <a href="{{route('seller.product.status',[$product->id,'1'])}}"><span class="badge badge-warning">Deactive</span></a>
                                    @else
                                    <a href="{{route('seller.product.status',[$product->id,'0'])}}"><span class="badge badge-success">Active</span></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($product->verification == 0)
                                    <span class="badge badge-warning">Unverified</span>
                                    @else
                                    <span class="badge badge-success">Verified</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('addimage',$product->id)}}" class="btn btn-link p-0 btn-sm rounded-0"><i class="fa fa-image"></i></a>
                                    <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#edit-{{$product->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content  ">
                                                <div class="modal-headerm " style="background-color: #002f34 !important;">
                                                    <h5 class="modal-title pl-3" id="exampleModalLabel" style="color:white">Edit Product</h5>
                                                    <button type="button" class="close pr-3 mt-0" data-dismiss="modal" aria-label="Close" style="color:white;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container">
                                                        {{Form::open(['method'=>'patch','route'=>['seller.product.update',$product->id],'enctype'=>'multipart/form-data'])}}
                                                           @php($cat =App\Category::where('id',$product->cat_id)->first())
                                                        

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Product name</label>
                                                                    <input type="text" name="product" class="form-control form-control-sm rounded-0" required="" value="{{$product->name}}">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Product Price</label>
                                                                    <input type="number" name="product_price" class="form-control form-control-sm rounded-0" required="" placeholder="100" value="{{$product->price}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Product Discount(%)</label>
                                                                    <input type="number" name="discount" class="form-control form-control-sm rounded-0" placeholder="5" value="{{$product->discount}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php($categories =App\Category::where('id','!=',$product->cat_id)->where('status','1')->get())
                                                        <div class="row" >
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Category</label>
                                                                    <select name="category" class="form-control form-control-sm rounded-0" required>
                                                                        <option value="{{$product->cat_id}}">{{$cat->name}}</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                       

                                                                    </select>

                                                                </div>
                                                            </div>
                                                         

                                                            <!-- <div class="col">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControl">Brand</label>
                                                                    <input type="text" class="form-control form-control-sm rounded-0" name="brand" value="{{$product->brand}}" >

                                                                    </select>
                                                                </div>
                                                            </div> -->

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Thumbnail</label>
                                                                    <img src="{{asset('images/'.$product->thumbnail)}}" height="30">
                                                                    <input type="file" name="thumbnail" class="form-control form-control-sm rounded-0">
                                                                    <input type="hidden" name="oldfile" value="{{$product->thumbnail}}">
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Product color</label>
                                                                    <input type="text" name="color" class="form-control form-control-sm rounded-0" required="" value="{{$product->color}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col pb-2">
                                                                <label>Description</label>
                                                                <textarea class="form-control ckeditor rounded-0" name="shortdesc" required="">
                                                                {{$product->description}}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col pb-2">
                                                                <label>Location of Product(full address ex: street,city,country)</label>
                                                                <input type="text" name="place" id="place" required="" class="form-control form-control-sm rounded-0" placeholder="tinpaini,Biratnagar,Nepal" value="{{$product->location}}">
                                                            </div>
                                                        </div>



                                                        <button type="submit" class="btn btn-primary p-2" style="border-radius:0px; background-color:#002f34 !important">Save Product</button>
                                                        {{Form::close()}}
                                                    </div>

                                                </div>
 
                                            </div>
                                        </div>
                                    </div>









                                    <a href="{{route('seller.product.delete',$product->id)}}" style="color:red;" data-toggle="tooltip" title="Delete Product"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>

                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



</div>
</div>
</div>
</div>



<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0" style="background-color: #002f34 !important;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    {{Form::open(['method'=>'post','route'=>'seller.product.store','enctype'=>'multipart/form-data'])}}
                    @php($categories= App\Category::where('status','1')->get())



                  

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" name="product" class="form-control form-control-sm rounded-0" required="">
                            </div>
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" name="product_price" class="form-control form-control-sm rounded-0" required="" placeholder="100">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Product Discount(%)</label>
                                <input type="number" name="discount" class="form-control form-control-sm rounded-0" placeholder="5" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Thumbnail (for better permofmance please upload 450*450)</label>
                                <input type="file" name="thumbnail" required class="form-control form-control-sm rounded-0">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Product color</label>
                                <input type="text" name="color" class="form-control form-control-sm rounded-0">
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control form-control-sm rounded-0" required>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <!-- <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControl">Brand</label>
                                <input type="text" name="brand" class="form-control form-control-sm rounded-0">

                            </div>
                        </div> -->

                    </div>
                    <div class="row">
                        <div class="col pb-2">
                            <label>Description</label>
                            <textarea class="form-control ckeditor rounded-0" name="shortdesc" required=""></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pb-2">
                            <label>Location of Product(full address ex: street,city,country)</label>
                            <input type="text" name="place" id="place" required="" class="form-control form-control-sm rounded-0" placeholder="tinpaini,Biratnagar,Nepal">
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary p-2" style="border-radius:0px; background-color:#002f34 !important">Save Product</button>
                    {{Form::close()}}
                </div>

            </div>

        </div>
    </div>
</div>





@include('front.includes.footer')