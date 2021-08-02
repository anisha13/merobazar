@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="container-fluid">
    <div class="row card rounded-0">
        <div class="col-lg-12 pt-2 pl-1 pr-1">
            <span style="font-size:20px;">Add More Images </span>
            <a href="{{route('product.index')}}" class="btn btn-info pull-right pt-1 pb-1 pl-2 pr-2 rounded-0"><i class="fa fa-backward"> </i> Go Back</a>
        </div>
    </div>
</div>

<div class="container-fluid mt-2">
    <div class="row card rounded-0">
        <h5 class="p-3">Product Images</h5>
        <hr>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <span><b>Product Name</b>: {{$product->name}}</span><br>
                    @php($category =App\Category::where('id',$product->cat_id)->first())
                    <span><b>Product Category</b>: {{$category->name}}</span><br>
                    <span><b>Product Color</b>: {{$product->color}}</span><br>
                </div>
                <div class="col-lg-5">
                    <img src="{{asset('/images/'.$product->thumbnail)}}" height="150">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{Form::open(['method'=>'post','route'=>'image.store','enctype'=>'multipart/form-data'])}}
                <input type="hidden" name="product" value="{{$product->id}}">
                <div class="field_wrapper">
                    <input type="file" name="image[]" class="form-control" multiple="" type="image/*">
                </div><br>
                <button class="btn btn-info rounded-0 pt-1 pb-1 pr-2 pl-2" type="submit">Save Images</button>
                {{Form::close()}}
            </div>
        </div>


    </div>
</div>

<div class="container-fluid mt-2 mb-5">
    <div class="row card rounded-0">
    <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Product_ID</th>
                  
                    <th>Image</th>
                    <th>Active/Deactive</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                    <tbody>
                      @php($i=1)
                      @foreach($product->galleries as $attribu)
                      
                      <tr>
                      <th>{{$i++}}</th>
                      <th>{{$attribu->product_id}}</th>
                    <th><img src="{{asset('/images/'.$attribu->image)}}" height="60"></th>
                    <th>
                       @if($attribu->status == 0)
                       <a href="{{route('galery.status',[$attribu->id,'1'])}}"><span class="badge badge-warning">Deactive</span></a>
                       @else
                       <a href="{{route('galery.status',[$attribu->id,'0'])}}"><span class="badge badge-success">Active</span></a>
                       @endif
                    </th>
                    
                    <th>
                      
                      <a href="{{route('admin.gallery.delete',$attribu->id)}}" style="color:red;"><i class="fa fa-trash"></i></a>
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




<!-- endmodal -->

@include('back.includes.footer')