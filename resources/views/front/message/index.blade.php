@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')


<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;">Messages</div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered table-responsive" style="width:100%">

                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Productname</th>
                                <th>Message</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($messages as $message)
                            @php($product =App\Product::find($message->product_id))
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>@if(!empty($product->name)) {{$product->name}}  @endif </td>
                                <td><textarea>{{$message->message}}</textarea></td>
                                <td>
                                    @if($message->status == '1')
                                    <a href="{{route('view.message.front',[$message->id,'1'])}}" class="badge badge-info rounded-0 p-2" style="font-size:13px;">Seen</a>
                                    @else
                                    <a href="{{route('view.message.front',[$message->id,'1'])}}" class="badge badge-warning rounded-0 p-2" style="font-size:13px;">View</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('front.message.delete',$message->id)}}" class="btn btn-danger btn-sm ">Delete</a>
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







@include('front.includes.footer')