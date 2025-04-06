@extends('frontend.layouts.master')

@section('content')
    <div class="container">

        <div class="max-w-3xl mt-lg-11 mx-auto lg:p-10 p-5 tube-card">

            <div class="text-center mt-4 mb-6 lg:mt-10">
                <h1 class="font-semibold md:text-3xl text-xl text-center uk-heading-line"><span>About Us</span></h1>
            </div>
            <article class="space-y-2 uk-article">
                <img src="{{asset($about->featured_image)}}" alt="" srcset="">
                <p class="lead">{!!$about->description!!}</p>


            </article>



        </div>


    </div>
@endsection

@section('script')


@endsection
