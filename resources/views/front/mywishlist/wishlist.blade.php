@include('front.includes.header')

@include('back.includes.message')

@include('front.user.menuinclude.index')


<div class="col-lg-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="container-fluid p-2" style="background-color:gainsboro; font-size:20px;">Wishlist Your Products </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 pt-3">
            <div class="tile">
                <div class="tile-body">
                    <table id="myTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>

                                <th>S.N</th>
                                <th>Images</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Seller Name</th>
                                <th>Seller Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @php($wishlists =App\Wishlist::where('user_id',auth()->user()->id)->get())

                            @foreach($wishlists as $wishlist)
                            @php($product =App\Product::where('id',$wishlist->product_id)->first())
                           
                            @if(!empty($product))
                            @php($user =App\User::where('id',$product->seller_id)->first())
                            <tr>

                                <td>{{$i++}}</td>
                                <td><img src="{{asset('images/'.$product->thumbnail)}}" height="20"></td>
                                <td>{{$product->name}}</td>
                                <td>{{number_format($product->price)}}</td>
                                @if(!empty($user))
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                <td>
                                    <a href="{{route('wishlist.delete',$product->id)}}" class="btn btn-danger btn-sm delete-wishlist p-2  rounded-0"><i class="fa fa-trash"></i></a>

                                    <a href="{{route('detail',$product->slug)}}" class="btn btn-info p-2 rounded-0 btn-sm"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endif
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


<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#002f34 !important;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <div class="row">
                    <div class="form-group col">
                        <label>Name</label>
                        <input type="text" nama="name" required class="rounded-0 form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Email</label>
                        <input type="email" nama="email" required class="rounded-0 form-control">
                    </div>
                    <div class="form-group col">
                        <label>Phone</label>
                        <input type="text" nama="phone" required class="rounded-0 form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Address</label>
                        <textarea class="form-control rounded-0" name="address" required></textarea>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Account Type</label>
                    <select class="form-control rounded-0 " id="exampleFormControlSelect1" name="acc_type">
                        <option>Buyer</option>
                        <option>Seller</option>
                    </select>
                </div>

                <button class="btn btn-defaulr p-2 rounded-0" style="background-color: #002f34 !important; color:white;" type="submit">Update Profile</button>
            </div>

        </div>
    </div>
</div>





@include('front.includes.footer')