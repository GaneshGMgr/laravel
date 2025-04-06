@extends('layouts.master')
@section('head')
<title>Jobster - Home v5</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection
@section('content')
@foreach ($aboutUs as $info)


<section class="pxp-page-image-hero pxp-cover" style="background-image: url({{getImage('about', $info->featured_image_1)}});">
    <div class="pxp-hero-opacity"></div>
    <div class="pxp-page-image-hero-caption">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                    <h1 class="text-center">{{$info->title_1}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="pxp-container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-xxl-6">
                <h2 class="pxp-section-h2 text-center">About Us</h2>
                <p class="pxp-text-light text-center">We help employers and candidates find the right fit</p>

                <div class="mt-4 mt-md-5 text-center" >
                    <p style="text-align: justify;">{!! $info->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="mt-100">
    <div class="pxp-container">
        <div class="row justify-content-between align-items-center mt-4 mt-md-5">
            <div class="col-lg-6 col-xxl-5">
                <div class="pxp-info-fig pxp-animate-in pxp-animate-in-right pxp-in">
                    <div class="pxp-info-fig-image pxp-cover" style="background-image: url({{getImage('about', $info->featured_image_2)}});"></div>
                    <div class="pxp-info-stats">
                        @foreach ($data_counters as $data)
                        <div class="pxp-info-stats-item pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                            <div class="pxp-info-stats-item-number">{{$data->job_quantity}}<span>job offers</span></div>
                            <div class="pxp-info-stats-item-description">in {!!$data->job_type!!}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xxl-6">
                <div class="pxp-info-caption pxp-animate-in pxp-animate-in-top mt-4 mt-sm-5 mt-lg-0 pxp-in">
                    <h2 class="pxp-section-h2">{{$info->title_2}}</h2>
                    <p class="pxp-text-light">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>
                    <div class="pxp-info-caption-list">
                        @foreach ($data_counters as $data)
                        <div class="pxp-info-caption-list-item">
                            <img src="{{asset('assets/images/check.svg')}}" alt="-"><span>{!!$data->title!!}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="pxp-info-caption-cta">
                        <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">Get Started Now<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endforeach
@endsection
