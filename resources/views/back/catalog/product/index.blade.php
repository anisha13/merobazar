@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="container-fluid">
    <div class="row card rounded-0">
        <div class="col-lg-12 pt-2 pl-1 pr-1">
            <span style="font-size:20px; p-2">Products</span>
             <button class="btn btn-info rounded-0 pl-2 pr-2 pt-1 pb-1 pull-right" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus"></i> Add Products</button>
         
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row card rounded-0">
        <div class="col-md-12 pt-3">
            <div class="tile">
                <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Product Category</th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Thumbnail</th>
                                <th>Verified/unverified</th>
                                <th>Active/Deactive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->brand}}</td>
                                @php($category =App\Category::where('id',$product->cat_id)->first())
                                <td>{{$category->name}}</td>
                                <td>{{$product->color}}</td>
                                <td>{{$product->price}}</td>
                                <td><img src="{{asset('/images/'.$product->thumbnail)}}" height="30"></td>
                                <td>
                                    @if($product->verification == 0)
                                    <a href="{{route('product.verification',[$product->id,'1'])}}"><span class="badge badge-warning">Unverify</span></a>
                                    @else
                                    <a href="{{route('product.verification',[$product->id,'0'])}}"><span class="badge badge-success">Verify</span></a>
                                    @endif
                                </td>
                                <td>
                                    @if($product->status == 0)
                                    <a href="{{route('product.status',[$product->id,'1'])}}"><span class="badge badge-warning">Deactive</span></a>
                                    @else
                                    <a href="{{route('product.status',[$product->id,'0'])}}"><span class="badge badge-success">Active</span></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-link btn-sm rounded-0 p-0" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('image.product',$product->id)}}" class="btn btn-link btn-sm rounded-0 p-0" data-toggle="tooltip" data-placement="top" title="Add More Images"><i class="fa fa-image"></i></a>

                                    <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-link btn-sm rounded-0 p-0" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="fa fa-trash"></i></button>
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



<!-- modal -->


<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0" style="background-color: #2a3f54">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'post','route'=>'product.store','enctype'=>'multipart/form-data'])}}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product" placeholder="product name" required class="form-control rounded-0">
                        </div>
                    </div>

                </div>
                <div class="row">
                    {{--
                    <div class="col">
                        <div class="form-group">
                            <label>Brand</label>
                            <input type="text" name="brand" placeholder="brand" required class="form-control rounded-0">
                        </div>
                    </div>--}}
                    <div class="col">
                        <div class="form-group">
                            <label>Select Category</label><br>
                            <select class="select" id="exampleFormControlSelect1" name="category">
                                {!! $categories_dropdown !!}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" name="price" placeholder="0" class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Product Discount(%)</label>
                            <input type="text" name="discount" placeholder="0" class="form-control rounded-0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="image" required class="form-control form-control-file rounded-0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Product Color</label>
                            <input type="text" name="color" required class="form-control  rounded-0">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control rounded-0" id="summernote" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Location Of Product (street,city,Country)</label>
                            <input type="text" name="location" required class="form-control  rounded-0">
                        </div>
                    </div>
                </div>

                <button class="btn btn-info pl-2 pr-2 pt-1 pb-1 rounded-0 pull-right" style="background-color: #2a3f54;" type="submit">Add Product</button>
                {{Form::close()}}

            </div>

        </div>
    </div>
</div>







<!-- endmodal -->

@include('back.includes.footer')
<script>
    $('#maincategory').click(function() {
        base = $('base').attr('href');
        url = base + '/product/maincategory';
        $.get(url).done(function(response) {
            $('#update').html(response);
        });
    });
</script>

<script>
    $('.productcat').click(function() {
        id = $(this).data('id');

        base = $('base').attr('href');
        url = base + '/productcategory/' + id + '/data';
        $.get(url).done(function(response) {
            $('#update').html(response);
        });
    });
</script>