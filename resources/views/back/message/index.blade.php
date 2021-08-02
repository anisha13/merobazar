@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')
@php($messages =App\Message::whereNull('vendor_id')->get())

<div class="container">
    <div class="row card rounded-0">
        <div class="col-lg-12 p-2 ">

            <span data-toggle="modal" data-target="#exampleModal" style="border-radius:0px; font-size:20px;"></i>Messages</span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row card rounded-0">
        <div class="col-md-12 pt-3">
            <div class="tile">
                <div class="tile-body">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>ProductName</th>
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
                                    <a href="{{route('view.message',[$message->id,'1'])}}" class="badge badge-info rounded-0 p-2" style="font-size:13px;">Seen</a>
                                    @else
                                    <a href="{{route('view.message',[$message->id,'1'])}}" class="badge badge-warning rounded-0 p-2" style="font-size:13px;">View</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.message.delete',$message->id)}}" class="btn btn-danger btn-sm">Delete</a>
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








@include('back.includes.footer')