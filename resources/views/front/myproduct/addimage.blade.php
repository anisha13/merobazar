@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')


<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;">Add Images</div>
        </div>
    </div>
    
    
<div class="row">
    
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-7">
          <span><b>Product Name</b>: {{$product->name}}</span><br>
          
          <span><b>Product Color</b>: {{$product->color}}</span><br>
        </div>
        <div class="col-lg-5">
          <img src="{{asset('images/'.$product->thumbnail)}}" height="150">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        {{Form::open(['method'=>'post','route'=>'seller.image.store','enctype'=>'multipart/form-data'])}}
        <input type="hidden" name="product" id="imageid" value="{{$product->id}}">
      <div class="field_wrapper">
        <input type="file" name="image[]" id="image" class="form-control" multiple="" type="image/*">
    </div><br>
     <button class="btn btn-info rounded-0 image-store p-2" style="background-color:#002f34 !important;"  type="submit">Save Images</button>
    {{Form::close()}}
    </div>
    </div>
    

   </div>

   <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered table-sm" id="sampleTable">
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Product_ID</th>
                  
                    <th>Image</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                    
                  </tr>
                </thead>
                    <tbody>
                      @php($i=1)
                      @foreach($product->galleries as $attribu)
                      
                      <tr>
                      <th>{{$i++}}</th>
                      <th>{{$attribu->product_id}}</th>
                    <th><img src="{{asset('images/'.$attribu->image)}}" height="20"></th>
                   <!--  -->
                    
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


</div>
</div>
</div>
</div>







@include('front.includes.footer')