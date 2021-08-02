@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')

<div class="container-fluid">
    <div class="row card rounded-0">
        <div class="col-lg-12 pt-2">
            <span style="font-size:20px;">Slider Image</span>
            <button type="button" class="btn btn-info pl-2 pr-2 pt-1 pb-1 pull-right rounded-0" data-toggle="modal" data-target="#slider">
                Add Images
            </button>
        </div>


    </div>
</div>
@php($slider = App\Slider::OrderBy('created_at','desc')->where('status','1')->first())
@if(!empty($slider))
<div class="container-fluid mt-3">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('/images/'.$slider->image)}}" alt="First slide">
    </div>
    @php($sliderss =App\Slider::orderBy('created_at','desc')->where('id','!=',$slider->id)->where('status','1')->get())
    @foreach($sliderss as $slider)
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('/images/'.$slider->image)}}" alt="Second slide">
    </div>
    @endforeach
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
@endif





<div class="container-fluid mt-5">
    <div class="row card rounded-0">
    <div class="col-md-12 pt-3">
            <div class="tile">
                <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>S.N</th>
                            <th>Images</th>
                            <th>Status</th>
                        
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                        @foreach($sliders as $slider)
                        <tr>
                         
                            <td>{{$i++}}</td>
                            <td><img src="{{asset('/images/'.$slider->image)}}" height="50"></td>
                            <td>
                            @if($slider->status == '0')
                            <a href="{{route('slider.status',[$slider->id,'1'])}}" ><span class="badge badge-danger pl-2 pr-2 pt-1 pb-1 rounded-0">InActive</span></a>
                            @else
                            <a href="{{route('slider.status',[$slider->id,'0'])}}" ><span class="badge badge-success pl-2 pr-2 pt-1 pb-1 rounded-0">Active</span></a>
                            @endif
                            </td>
                            <td>

                                <a href="{{route('image.delete',$slider->id)}}" class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i> Delete</a>
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




<!-- Modal -->
<div class="modal fade" id="slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="container">
        {{Form::open(['method'=>'post','route'=>'slider.store','enctype'=>'multipart/form-data'])}}

        <div class="form-group">
            <label>Upload Images For Sliders(1680*320 in pixel)</label><br>
            <input type="file" name="image[]" class="form-control-file" accept="image/*" multiple required>
        </div>
        <!-- <div class="form-group">
            <label>Title</label><br>
            <input type="text" name="title" class="form-control"  required>
        </div> -->
        <button class="btn btn-info btn-sm">Upload</button>


           {{Form::close()}}
            </div>
          
        </div>
    </div>
</div>





@include('back.includes.footer')