@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')


<div class="container">
    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">

            <span  data-toggle="modal" data-target="#exampleModal" style="border-radius:0px; font-size:20px;"></i>Messages</span>
            <a href="{{route('admin.question')}}" class="btn btn-info pl-3 pr-3 pt-1 pb-1 rounded-0" style="float:right;"><i class="fa fa-backward"></i>  Go Back</a>
        </div>
    </div>
</div>
<div class="container mt-2">
<div class="row  rounded-0">
        <div class="col-lg-9 p-2 ">
             <p>Name : <span>{{$question->name}}</span></p>
             <p>Email : <span>{{$question->email}}</span></p>
             <p>Message: <span><textarea class="form-control">
             {{$question->message}}
             </textarea></span></p>
           
        </div>
        @if(!empty($question->product_id))
        <div class="col-lg-3 p-2 ">
            @php($product =App\Product::find($question->product_id))
            <img src="{{asset('/images/'.$product->thumbnail)}}" height="100">
            <p class="pl-2">{{$product->name}}</p>
            <p class="pl-2" style="margin-top:-20px !important;">NPR {{$product->price}}</p>
        </div>
        @endif
    </div>
</div>









@include('back.includes.footer')
<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>