@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')


<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;">Messages</div>
           
        </div>
    </div>
    <div class="container-fluid mt-2">
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
            <img src="{{asset('images/'.$product->thumbnail)}}" height="100">
            <p class="pl-2">{{$product->name}}</p>
            <p class="pl-2" style="margin-top:-20px !important;">NPR {{$product->price}}</p>
        </div>
        @endif
    </div>
</div>







</div>


</div>
</div>
</div>
</div>







@include('front.includes.footer')