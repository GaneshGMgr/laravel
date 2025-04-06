@extends('layouts.master')
@section('head')
<title>Jobster - Home v5</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection
@section('content')
@foreach ($aboutUs as $data)
<section class="pxp-page-image-hero pxp-cover"
    style="background-image: url({{getImage('about', $data->featured_image_1)}});">
    <div class="pxp-hero-opacity"></div>
    <div class="pxp-page-image-hero-caption">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                    <h1 class="text-center">{{$data->title_1}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="pxp-container">
    </div>
</section>
<section class="section-box mb-5">
    <div class="post-loop-grid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="mt-20">
                        <p style="text-align:justify">{!! $data->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <img src="{{getImage('about', $data->featured_image_2)}}"
                        alt="Message from Chairperson" style="border-radius: 8px;height: auto; max-width: 100%; vertical-align: top;" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection
