@extends('layouts.master')
@section('head')
<title>Jobster -Country List</title>
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
@endsection
@section('content')
<section class="mt-100">
    <div class="pxp-container">
        <h2 class="pxp-section-h2 text-center">Featured Cities</h2>
        <p class="pxp-text-light text-center">Start your next carrer in a beautiful city</p>

        <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top pxp-in">
            @foreach ($country as $info)
            <div class="col-md-6 col-xl-4 col-xxl-3">
                <a href="jobs-list-1.html" class="pxp-cities-card-2">
                    <div class="pxp-cities-card-2-image-container">
                        <div class="pxp-cities-card-2-image pxp-cover" style="background-image: url({{getImage('country', $info->featured_image)}});"></div>
                    </div>
                    <div class="pxp-cities-card-2-info">
                        <div class="pxp-cities-card-2-name">{{$info->name}}</div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
