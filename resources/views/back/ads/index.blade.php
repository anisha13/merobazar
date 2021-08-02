@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')
<div class="container-fluid">
    <div class="row card rounded-0">
    <div class="col-lg-12 p-2 ">
        <button class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;"><i class="fa fa-plus"></i> Advertising Images</button>
    </div>
    </div>
</div>
<div class="container-fluid mt-2">
    <div class="row card rounded-0">
    <div class="col-lg-12 p-2 ">
    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
            <div class="tile">
                <div class="tile-body">

                <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                        <tr>

                            <th>Position</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                        <tr>

                            <td>{{$slider->setlocation}}</td>
                            <td><img src="{{asset('/images/'.$slider->image)}}" height="50"></td>
                            @if($slider->status =="0")
                            <td><a href="{{route('ads.publish',[$slider->id,'1'])}}" class="btn btn-info btn-sm rounded-0"><i class="fa fa-upload"></i> Publish</a></td>
                            @else
                             <td><a href="{{route('ads.publish',[$slider->id,'0'])}}" class="btn btn-warning btn-sm rounded-0"><i class="fa fa-upload"></i> UnPublish</a></td>
                             @endif

                            <td>
                                
                                <a href="{{route('ads.delete',$slider->id)}}" class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertising Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <div class="container">
        {{Form::open(['method'=>'post','route'=>'ads.store','enctype'=>'multipart/form-data'])}}

           
        <div class="form-group">
            <label>Upload Images </label><br>
            <input type="file" name="image[]" class="form-control-file" accept="image/*" multiple required>
        </div>
        <div class="form-group">
            <label>Url (optional) </label><br>
            <input type="text" name="url" class="form-control" placeholder="http://abc.com">
        </div>
        <div class="form-group">
                <label for="exampleFormControlSelect1">Selecet Position</label><br>
                <select class="form-control select" id="exampleFormControlSelect1" name="title">
                    <option>Select Position</option>
                    @php($brands =App\Brand::where('status','1')->get())
                    <option>below slider</option>
                    @foreach($brands as $brand)
                    <option>{{$brand->name}}</option>
                    @endforeach
                  
                  
                </select>
              </div>
        <button class="btn btn-info btn-sm">Upload</button>


           {{Form::close()}}
       </div>
 
      </div>
     
    </div>
  </div>
</div>
    </div>
    </div>
</div>


@include('back.includes.footer')