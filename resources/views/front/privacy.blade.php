@include('front.includes.header')


@include('flash::message')
@php($about =App\Companydetail::orderBy('created_at','desc')->first())

<div class="container-fluid">
	{!! $about->privacy!!}
</div>






@include('front.includes.footer')