@extends('layouts.master')
@section('head')
<title>Jobster - Home v5</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection
@section('content')

<section>
    <div class="pxp-container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="pxp-blog-hero">
                    <h1 class="text-center">Top Career Advice</h1>
                    <div class="pxp-hero-subtitle pxp-text-light text-center">Browse the latest career advices</div>
                </div>

                <div id="pxp-blog-featured-posts-carousel" class="carousel slide carousel-fade pxp-blog-featured-posts-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <div class="pxp-featured-posts-item pxp-cover" style="background-image: url({{asset('assets/images/company-hero-5.jpg')}});">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-featured-posts-item-caption">
                                    <div class="pxp-featured-posts-item-caption-content">
                                        <div class="row align-content-center justify-content-center">
                                            <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                                                <div class="pxp-featured-posts-item-date">August 31, 2021</div>
                                                <div class="pxp-featured-posts-item-title">10 awesome free career self assessments</div>
                                                <div class="pxp-featured-posts-item-summary pxp-text-light mt-2">Figuring out what you want to be when you grow up is hard, but a career test can make it easier to find...</div>
                                                <div class="mt-4 mt-md-5 text-center">
                                                    <a href="single-blog-post.html" class="btn rounded-pill pxp-section-cta">Read Article<span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="pxp-featured-posts-item pxp-cover" style="background-image: url({{asset('assets/images/company-hero-3.jpg')}});">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-featured-posts-item-caption">
                                    <div class="pxp-featured-posts-item-caption-content">
                                        <div class="row align-content-center justify-content-center">
                                            <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                                                <div class="pxp-featured-posts-item-date">September 5, 2021</div>
                                                <div class="pxp-featured-posts-item-title">How to start looking for a job</div>
                                                <div class="pxp-featured-posts-item-summary pxp-text-light mt-2">Your resume is perfect. It's keyword-optimized, industry-specified, full of achievements, backed by data...</div>
                                                <div class="mt-4 mt-md-5 text-center">
                                                    <a href="single-blog-post.html" class="btn rounded-pill pxp-section-cta">Read Article<span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <div class="pxp-featured-posts-item pxp-cover" style="background-image: url({{asset('assets/images/company-hero-1.jpg')}});">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-featured-posts-item-caption">
                                    <div class="pxp-featured-posts-item-caption-content">
                                        <div class="row align-content-center justify-content-center">
                                            <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                                                <div class="pxp-featured-posts-item-date">September 10, 2021</div>
                                                <div class="pxp-featured-posts-item-title">Resume samples</div>
                                                <div class="pxp-featured-posts-item-summary pxp-text-light mt-2">Need help writing a resume? Looking for resume examples for specific industries? You’ll find a variety...</div>
                                                <div class="mt-4 mt-md-5 text-center">
                                                    <a href="single-blog-post.html" class="btn rounded-pill pxp-section-cta">Read Article<span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="pxp-featured-posts-item pxp-cover" style="background-image: url({{asset('assets/images/company-hero-2.jpg')}});">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-featured-posts-item-caption">
                                    <div class="pxp-featured-posts-item-caption-content">
                                        <div class="row align-content-center justify-content-center">
                                            <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                                                <div class="pxp-featured-posts-item-date">September 15, 2021</div>
                                                <div class="pxp-featured-posts-item-title">100 top interview questions - be prepared</div>
                                                <div class="pxp-featured-posts-item-summary pxp-text-light mt-2">While there are as many different possible interview questions as there are interviewers, it always helps...</div>
                                                <div class="mt-4 mt-md-5 tex
                                                t-center">
                                                <a href="single-blog-post.html" class="btn rounded-pill pxp-section-cta">Read Article<span class="fa fa-angle-right"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#pxp-blog-featured-posts-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#pxp-blog-featured-posts-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="mt-4 mt-lg-5">
                <div class="row">
                    <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                        <div class="pxp-posts-card-1 pxp-has-border">
                            <div class="pxp-posts-card-1-top">
                                <div class="pxp-posts-card-1-top-bg">
                                    <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-1.jpg')}});"></div>
                                    <div class="pxp-posts-card-1-info">
                                        <div class="pxp-posts-card-1-date">August 31, 2021</div>
                                        <a href="blog-list-1.html" class="pxp-posts-card-1-category">Assessments</a>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-content">
                                    <a href="single-blog-post.html" class="pxp-posts-card-1-title">10 awesome free career self assessments</a>
                                    <div class="pxp-posts-card-1-summary pxp-text-light">Figuring out what you want to be when you grow up is hard, but a career test can make it easier to find...</div>
                                </div>
                            </div>
                            <div class="pxp-posts-card-1-bottom">
                                <div class="pxp-posts-card-1-cta">
                                    <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                        <div class="pxp-posts-card-1 pxp-has-border">
                            <div class="pxp-posts-card-1-top">
                                <div class="pxp-posts-card-1-top-bg">
                                    <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-2.jpg')}});"></div>
                                    <div class="pxp-posts-card-1-info">
                                        <div class="pxp-posts-card-1-date">September 5, 2021</div>
                                        <a href="blog-list-1.html" class="pxp-posts-card-1-category">Jobs</a>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-content">
                                    <a href="single-blog-post.html" class="pxp-posts-card-1-title">How to start looking for a job</a>
                                    <div class="pxp-posts-card-1-summary pxp-text-light">Your resume is perfect. It's keyword-optimized, industry-specified, full of achievements, backed by data...</div>
                                </div>
                            </div>
                            <div class="pxp-posts-card-1-bottom">
                                <div class="pxp-posts-card-1-cta">
                                    <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                        <div class="pxp-posts-card-1 pxp-has-border">
                            <div class="pxp-posts-card-1-top">
                                <div class="pxp-posts-card-1-top-bg">
                                    <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-3.jpg')}});"></div>
                                    <div class="pxp-posts-card-1-info">
                                        <div class="pxp-posts-card-1-date">September 10, 2021</div>
                                        <a href="blog-list-1.html" class="pxp-posts-card-1-category">Resume</a>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-content">
                                    <a href="single-blog-post.html" class="pxp-posts-card-1-title">Resume samples</a>
                                    <div class="pxp-posts-card-1-summary pxp-text-light">Need help writing a resume? Looking for resume examples for specific industries? You’ll find a variety...</div>
                                </div>
                            </div>
                            <div class="pxp-posts-card-1-bottom">
                                <div class="pxp-posts-card-1-cta">
                                    <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                        <div class="pxp-posts-card-1 pxp-has-border">
                            <div class="pxp-posts-card-1-top">
                                <div class="pxp-posts-card-1-top-bg">
                                    <div class="pxp-posts-card-1-image pxp-cover" style="background-image:
[ 08 June 2023 16:16 ] ⁨Ganesh Gharti Magar⁩: url({{asset('assets/images/post-card-4.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">September 15, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Interview</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">100 top interview questions - be prepared</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">While there are as many different possible interview questions as there are interviewers, it always helps...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                            <div class="pxp-posts-card-1 pxp-has-border">
                                <div class="pxp-posts-card-1-top">
                                    <div class="pxp-posts-card-1-top-bg">
                                        <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-1.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">August 31, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Assessments</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">10 awesome free career self assessments</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">Figuring out what you want to be when you grow up is hard, but a career test can make it easier to find...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                            <div class="pxp-posts-card-1 pxp-has-border">
                                <div class="pxp-posts-card-1-top">
                                    <div class="pxp-posts-card-1-top-bg">
                                        <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-2.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">September 5, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Jobs</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">How to start looking for a job</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">Your resume is perfect. It's keyword-optimized, industry-specified, full of achievements, backed by data...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                            <div class="pxp-posts-card-1 pxp-has-border">
                                <div class="pxp-posts-card-1-top">
                                    <div class="pxp-posts-card-1-top-bg">
                                        <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-3.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">September 10, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Resume</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">Resume samples</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">Need help writing a resume? Looking for resume examples for specific industries? You’ll find a variety...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                            <div class="pxp-posts-card-1 pxp-has-border">
                                <div class="pxp-posts-card-1-top">
                                    <div class="pxp-posts-card-1-top-bg">
                                        <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-4.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">September 15, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Interview</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">100 top interview questions - be prepared</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">While there are as many different possible interview questions as there are interviewers, it always helps...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xxl-4 pxp-posts-card-1-container">
                            <div class="pxp-posts-card-1 pxp-has-border">
                                <div class="pxp-posts-card-1-top">
                                    <div class="pxp-posts-card-1-top-bg">
                                        <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{asset('assets/images/post-card-1.jpg')}});"></div>
                                        <div class="pxp-posts-card-1-info">
                                            <div class="pxp-posts-card-1-date">August 31, 2021</div>
                                            <a href="blog-list-1.html" class="pxp-posts-card-1-category">Assessments</a>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-content">
                                        <a href="single-blog-post.html" class="pxp-posts-card-1-title">10 awesome free career self assessments</a>
                                        <div class="pxp-posts-card-1-summary pxp-text-light">Figuring out what you want to be when you grow up is hard, but a career test can make it easier to find...</div>
                                    </div>
                                </div>
                                <div class="pxp-posts-card-1-bottom">
                                    <div class="pxp-posts-card-1-cta">
                                        <a href="single-blog-post.html">Read more<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mt-lg-5 justify-content-between align-items-center">
                        <div class="col-auto">
                            <nav class="mt-3 mt-sm-0" aria-label="Blog articles pagination">
                                <ul class="pagination pxp-pagination">
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn rounded-pill pxp-section-cta mt-3 mt-sm-0">Show me more<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
