@include('front.includes.header')



@php($about =App\Companydetail::orderBy('created_at','desc')->first())

<div class="container-fluid">
	{!! $about->termsofsale!!}
</div>





@include('front.includes.footer')