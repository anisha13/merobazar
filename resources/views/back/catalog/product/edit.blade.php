@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')
@php($productcategory =App\Brand::where('status','1')->get())
<div class="container-fluid">
    <div class="row card rounded-0">
        <div class="col-lg-12 pt-2 pl-1 pr-1">
            <span style="font-size:20px;">Edit Products</span>
           <a href="{{route('product.index')}}" class="btn btn-info pull-right pt-1 pb-1 pl-2 pr-2 rounded-0" ><i class="fa fa-backward"> </i> Go Back</a>
        </div>
    </div>
</div>

<div class="container-fluid mt-2 mb-5">
    <div class="row card rounded-0">
        <div class="col-lg-12 pt-2 pl-1 pr-1">
        <div class="modal-body">
        {{Form::open(['method'=>'patch','route'=>['admin.product.update',$product->id],'enctype'=>'multipart/form-data'])}}
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" value="{{$product->name}}" name="product" placeholder="product name" required class="form-control rounded-0">
                        </div>
                    </div>

                </div>
                <div class="row">
                <div class="col">
                        <div class="form-group">
                            <label>Product Category</label><br>
                            <select class="select" id="exampleFormControlSelect1 form-control" name="brand">
                         
                            @foreach($productcategory as $productcat)
                            <option value="{{$productcat->name}}">{{$productcat->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Select Category</label><br>
                            <select class="select" id="exampleFormControlSelect1 form-control" name="category">
                            {!! $categories_drop !!}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" name="price" value="{{$product->price}}" placeholder="0" class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Product Discount(%)</label>
                            <input type="text" name="discount" value="{{$product->discount}}" placeholder="0" class="form-control rounded-0">
                        </div>
                    </div>
                </div>
                <img src="{{asset('/images/'.$product->thumbnail)}}" height="70">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="image"  class="form-control form-control-file rounded-0">
                            <input type="hidden" name="oldfile" required class="form-control form-control-file rounded-0" value="{{$product->thumbnail}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Product Color</label>
                            <input type="text" name="color" value="{{$product->color}}" required class="form-control  rounded-0">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control rounded-0" id="summernote" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Location Of Product (street,city,Country)</label>
                            <input type="text" name="location" required class="form-control  rounded-0" value="{{$product->location}}">
                        </div>
                    </div>
                   
                </div>

                <button class="btn btn-info pl-2 pr-2 pt-1 pb-1 rounded-0 pull-right" style="background-color: #2a3f54;" type="submit">Update Product</button>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>




<!-- endmodal -->

@include('back.includes.footer')
