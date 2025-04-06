@extends('layouts.master')
@section('head')
    <title>Jobster - Home v5</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
@endsection
@section('content')
    <section class="pxp-hero pxp-hero-bg pxp-cover"
        style="background-image: url({{ getImage('site', $site->featured_image) }});">
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-hero-caption">
            <div class="pxp-container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-9 col-xxl-8">
                        <h1 class="text-white text-center">Find the right job for you</h1>

                        <div class="pxp-hero-form pxp-hero-form-round pxp-large mt-4 mt-lg-5">
                            <form class="row gx-3 align-items-center"
                                action="https://pixelprime.co/themes/jobster/jobs-list-1.html">
                                <div class="col-12 col-lg">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><span class="fa fa-search"></span></span>
                                        <input type="text" class="form-control" placeholder="Job Title or Keyword">
                                    </div>
                                </div>
                                <div class="col-12 col-lg pxp-has-left-border">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><span class="fa fa-globe"></span></span>
                                        <input type="text" class="form-control" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-12 col-lg pxp-has-left-border">
                                    <div class="input-group mb-3 mb-lg-0">
                                        <span class="input-group-text"><span class="fa fa-folder-o"></span></span>
                                        <select class="form-select">
                                            <option selected>All categories</option>
                                            <option>Business Development</option>
                                            <option>Construction</option>
                                            <option>Customer Service</option>
                                            <option>Finance</option>
                                            <option>Healthcare</option>
                                            <option>Human Resources</option>
                                            <option>Marketing & Communication</option>
                                            <option>Project Management</option>
                                            <option>Software Engineering</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto">
                                    <button>Find Jobs</button>
                                </div>
                            </form>
                        </div>

                        <div class="pxp-hero-subtitle text-white text-center mt-3 mt-lg-4">Search your career opportunity
                            through <strong>12,800</strong> jobs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($about as $info)
        <section class="mt-100">
            <div class="pxp-container">
                <div class="row justify-content-between align-items-center mt-4 mt-md-5">
                    <div class="col-lg-6 col-xxl-5">
                        <div class="pxp-info-fig pxp-animate-in pxp-animate-in-right pxp-in">
                            <div class="pxp-info-fig-image pxp-cover"
                                style="background-image: url({{ getImage('about', $info->featured_image_2) }});"></div>
                            <div class="pxp-info-stats">
                                @foreach ($data_counters as $data)
                                    <div
                                        class="pxp-info-stats-item pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                                        <div class="pxp-info-stats-item-number">{{ $data->job_quantity }}<span>job
                                                offers</span></div>
                                        <div class="pxp-info-stats-item-description">in {!! $data->job_type !!}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-6">
                        <div class="pxp-info-caption pxp-animate-in pxp-animate-in-top mt-4 mt-sm-5 mt-lg-0 pxp-in">
                            <h2 class="pxp-section-h2">{{ $info->title_2 }}</h2>
                            <p class="pxp-text-light">Search all the open positions on the web. Get your own personalized
                                salary estimate. Read reviews on over 600,000 companies worldwide.</p>
                            <div class="pxp-info-caption-list">
                                @foreach ($data_counters as $data)
                                    <div class="pxp-info-caption-list-item">
                                        <img src="{{ asset('assets/images/check.svg') }}"
                                            alt="-"><span>{!! $data->title !!}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pxp-info-caption-cta">
                                <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">Get Started Now<span
                                        class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="mt-100">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">Featured Cities</h2>
            <p class="pxp-text-light text-center">Start your next carrer in a beautiful city</p>
            <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
                @foreach ($country as $info)
                    <div class="col-md-6 col-xl-4 col-xxl-3">
                        <a href="jobs-list-1.html" class="pxp-cities-card-2">
                            <div class="pxp-cities-card-2-image-container">
                                <div class="pxp-cities-card-2-image pxp-cover"
                                    style="background-image: url({{ getImage('country', $info->featured_image) }});"></div>
                            </div>
                            <div class="pxp-cities-card-2-info">
                                <div class="pxp-cities-card-2-name">{{ $info->name }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">Search by Category</h2>
            <p class="pxp-text-light text-center">Search your career opportunity with our categories</p>
            <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
                @foreach ($jobCategory as $jobs)
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="{{ $jobs->icon }}"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">{{ $jobs->name }}</div>
                            <div class="pxp-categories-card-2-subtitle">{{ $jobs->vacant_position }} open positions</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 mt-md-5 text-center pxp-animate-in pxp-animate-in-top pxp-in">
                <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">All Categories<span
                        class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">Current Demand</h2>

            <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
                <table class="table table-hover"
                    style="background-color:var(--pxpMainColorLight); border=2px solid black; border-radius: 10px;">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Job</th>
                            <th scope="col">Country</th>
                            <th scope="col">No. of Worker</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Waiter</td>
                            <td>UK</td>
                            <td>45</td>
                            <td><a href="#" class="href">view</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Senior Engineer</td>
                            <td>USA</td>
                            <td>10</td>
                            <td><a href="#" class="href">view</a></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Scafolder</td>
                            <td>Qatar</td>
                            <td>12</td>
                            <td><a href="#" class="href">view</a></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Plumber</td>
                            <td>Malaysia</td>
                            <td>12</td>
                            <td><a href="#" class="href">view</a></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Teacher</td>
                            <td>Thailand</td>
                            <td>7</td>
                            <td><a href="#" class="href">view</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 mt-md-5 text-center pxp-animate-in pxp-animate-in-top pxp-in">
                <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">All Demands<span
                        class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">Testimonials</h2>
            <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
                <div class="pxp-testimonials-1">
                    <div class="pxp-testimonials-1-circles d-none d-md-block">
                        <div class="pxp-testimonials-1-circles-item pxp-item-1 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-1.png') }});"></div>
                        <div
                            class="pxp-testimonials-1-circles-item pxp-item-2 pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                        </div>
                        <div
                            class="pxp-testimonials-1-circles-item pxp-item-3 pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                        </div>
                        <div class="pxp-testimonials-1-circles-item pxp-item-4 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-2.png') }});"></div>
                        <div class="pxp-testimonials-1-circles-item pxp-item-5 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-3.png') }});"></div>
                        <div
                            class="pxp-testimonials-1-circles-item pxp-item-6 pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                        </div>
                        <div class="pxp-testimonials-1-circles-item pxp-item-7 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-4.png') }});"></div>
                        <div
                            class="pxp-testimonials-1-circles-item pxp-item-8 pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn">
                        </div>
                        <div class="pxp-testimonials-1-circles-item pxp-item-9 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-5.png') }});"></div>
                        <div class="pxp-testimonials-1-circles-item pxp-item-10 pxp-cover pxp-animate-in pxp-animate-bounce pxp-in animate__animated animate__bounceIn"
                            style="background-image: url({{ asset('assets/images/customer-6.png') }});"></div>
                    </div>

                    <div class="pxp-testimonials-1-carousel-container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-10 col-md-6 col-lg-6 col-xl-5 col-xxl-4">
                                <div class="pxp-testimonials-1-carousel pxp-animate-in pxp-animate-in-top pxp-in">
                                    <div id="pxpTestimonials1Carousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($testimonial as $info)
                                                <div class="carousel-item text-center {{ $loop->first ? 'active' : '' }}">

                                                    <div class="pxp-testimonials-1-carousel-item-text"
                                                        style="color:black">{!! $info->description !!}</div>
                                                    <div class="pxp-testimonials-1-carousel-item-name"
                                                        style="color:black">{{ $info->name }}</div>

                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#pxpTestimonials1Carousel" data-bs-slide="prev">
                                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#pxpTestimonials1Carousel" data-bs-slide="next">
                                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    </section>
@endsection
