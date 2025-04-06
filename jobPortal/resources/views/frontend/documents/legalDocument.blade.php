@extends('layouts.master')
@section('head')
    <title>Jobster -Leagle Document</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
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
                    <div class="package-section">
                        <div class="container">
                            <div class="package-inner">
                                <div class="row">
                                    @foreach ($legalDocumentType as $legal)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="package-wrap" style="box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15; ">
                                            <figure class="feature-image" style="height:500px;">
                                                <a href="https://fsworkeragency.com.np/admin/uploads/license_certificates/61842-9381e3e8-c4c6-40ea-a475-59303ea4f738.jpg"
                                                    data-lightbox="lightbox-set">
                                                    <img src="{{ getImage('documents', $legal->featured_image) }}" style="height: 100%;
                                                    max-width: 100%;padding:10px;;
                                                    vertical-align: top;"
                                                        alt="Company Registration">
                                                </a>
                                            </figure>
                                            <div class="package-content-wrap">
                                                <div class="package-content">
                                                    <h3>{{$legal->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
