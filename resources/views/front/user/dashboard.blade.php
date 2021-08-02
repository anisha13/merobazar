@include('front.includes.header')

@include('front.user.menuinclude.index')
<div class="col-lg-9">
    <h1>Welcome Back to Dashboard</h1>
    Comment Box<br>
     <textarea class="form-control" readonly>@if(!empty(auth()->user()->comment)) {{auth()->user()->comment}} @else No comment yet :) @endif</textarea>
</div>
</div>
</div>

@include('front.includes.footer')
