@extends('layouts.master')
@section('content')
@foreach ($service1 as $service)
    <section class="pxp-page-image-hero pxp-cover" style="background-image: url({{ getImage('services', $service->featured_image_1) }});">
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-page-image-hero-caption">
            <div class="pxp-container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                        <h1 class="text-center">Overseas Recruitment Services</h1>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="pxp-container">
            <h2  style="font-size:25px; text-align:center; font-weight:bold;">We will help you to get job overseas.</h2>
            <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
                <div class="single-post-section">
                    <div class="single-post-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 primary right-sidebar">
                                    <figure class="feature-image">

                                        <img src="{{ getImage('services', $service->featured_image_2) }}"  loading="lazy" style="height: auto; max-width: 50%; vertical-align: top;">

                                    </figure>
                                </div>
                                <div class="col-lg-4 secondary">
                                    <div class="sidebar">
                                        <aside class="widget widget_latest_post widget-post-thumb">
                                            <h3 class="widget-title">Other Services</h3>
                                            <ul>
                                                <li>
                                                    <figure class="post-thumb">
                                                        <a
                                                            href="https://fsworkeragency.com.np/servicedetail/Training_Orientation">
                                                            <img src="https://fsworkeragency.com.np/admin/uploads/services/bc51b-2.jpg"
                                                                alt="Training &amp; Orientation" loading="lazy" style="height: auto; max-width: 20%; vertical-align: top;     border-style: none;">
                                                        </a>
                                                    </figure>
                                                    <div class="post-content">
                                                        <h5>
                                                            <a
                                                                href="{{route('training')}}" >Training
                                                                &amp; Orientation</a>
                                                        </h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </aside>
                                    </div>
                                </div>
                                <article class="single-content-wrap">
                                    <h3>Overseas Recruitment Service</h3>
                                    {!!$service->description!!}
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endsection
