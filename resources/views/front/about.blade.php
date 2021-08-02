@include('front.includes.header')



@php($about =App\Companydetail::orderBy('created_at','desc')->first())

<div class="container-fluid">
	{!! $about->about!!}
</div>





@include('front.includes.footer')