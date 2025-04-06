@extends('layouts.master')
@section('head')
<title>Jobster -Leagle Document</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection


@section('content')

<section class="pxp-page-image-hero pxp-cover"
    style="background-image: url(http://127.0.0.1:8000/assets/images/company-hero-3.jpg);">
    <div class="pxp-hero-opacity"></div>
    <div class="pxp-page-image-hero-caption">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                    <h1 class="text-center">We help companies and candidates find the right fit</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="pxp-container">
        <div class="row justify-content-center">
            <main id="content" class="site-main">
                <div class="carrer-page-section">
                    <div class="container">
                        <div class="vacancy-section">
                            <div class="vacancy-container">
                                <div class="vacancy-content-wrap">
                                    <div class="row">
                                        @foreach ($documentType as $type)
                                        <div class="col-md-4">
                                            <div class="vacancy-content">
                                                <h3>{{$type->title}}</h3>
                                                <p style="text-align:justify">{!!$type->description!!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection
