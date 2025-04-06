@extends('frontend.layouts.master')

@section('content')
    <!-- Slideshow -->


    <div class="uk-position-relative uk-visible-toggle overflow-hidden lg:-mt-20 w-full" tabindex="-1"
        uk-slideshow="animation: scale ;min-height: 200; max-height: 450 ;autoplay: t rue">


        <ul class="uk-slideshow-items rounded">
            <li>
                <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                    <img src="{{ asset(siteSetting()->below_slider) }}" class="object-cover" alt="" uk-cover>
                </div>
                <div class="container relative md:p-20 md:mt-7 p-5 h-full">
                    <div uk-slideshow-parallax="scale: 1,1,0.8"
                        class="flex flex-col justify-center h-full w-full space-y-3">
                        <h1 uk-slideshow-parallax="y: 100,0,0" class="lg:text-4xl text-2xl text-white font-semibold">Uni Aggregate </h1>

                    </div>
                </div>
            </li>

        </ul>

    </div>

    <div class="flex justify-center items-center h-screen mt-2">
        <div class="w-full max-w-3xl">
            <h4 class="text-4xl font-extrabold dark:text-teal-600 text-center mb-8">
                Check Eligibility
            </h4>

            <form id="eligibility-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8"
                action="{{ route('check.eligibility') }}" method="post">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-2">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Age
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="grid-last-name" type="text" name="age" placeholder="Age">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-stream">
                            Stream
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 form-select leading-tight focus:outline-none focus:shadow-outline"
                            id="grid-stream" name="stream">
                            <option value="" selected disabled>Stream</option>
                            @foreach (streamName() as $stream)
                                <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-course">
                            Course
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 form-select leading-tight focus:outline-none focus:shadow-outline"
                            id="grid-course" name="course">
                            <option value="" selected disabled>Course</option>
                            @foreach (course_master() as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-5">
                    <div class="w-full md:w-1/2 px-2">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-board">
                            Board
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-3 px-4 form-select leading-tight focus:outline-none focus:shadow-outline"
                            id="grid-board" name="board">
                            <option value="" selected disabled>Board</option>
                            @foreach (board() as $board)
                                <option value="{{ $board->id }}">{{ $board->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-5 md:mb-0">
                        <label class="block text-gray-700 text-sm font-bold mb-1" for="gpa">
                            GPA
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="gpa" type="text" placeholder="GPA" name="gpa">
                    </div>
                </div>



                <div class="text-center">
                    <button type="button"
                        class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        id="check-eligibility-btn">
                        Check
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="container">
        <div id="form-check">

            @foreach ($universities_by_country as $country => $universities)
                <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                    <h2 class="text-2xl font-semibold">Popular University in {{ $country }}</h2>
                    <a href="#" class="text-blue-500 sm:block hidden">See all</a>
                </div>

                <div class="mt-3">
                    <h4 class="py-3 border-b font-semibold text-grey-700 mx-1 mb-4" hidden>
                        <ion-icon name="star"></ion-icon> Featured today
                    </h4>

                    <!--  slider -->
                    <div class="mt-3">
                        <h4 class="py-3 border-b font-semibold text-grey-700 mx-1 mb-4" hidden>
                            <ion-icon name="star"></ion-icon> Featured today
                        </h4>

                        <div class="relative" uk-slider="finite: true">
                            <div class="uk-slider-container px-1 py-3">
                                <ul
                                    class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid">
                                    @foreach ($universities as $uni)
                                        <li>
                                            <a href="{{ route('university.detail.frontend', $uni->slug) }}"
                                                class="uk-link-reset">
                                                <div class="card uk-transition-toggle">
                                                    <div class="card-media h-40">
                                                        <div class="card-media-overly"></div>
                                                        <img src="{{ $uni->featured_image }}" alt=""
                                                            class="">
                                                        <span class="icon-play"></span>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="font-semibold line-clamp-2">{{ $uni->name }}
                                                        </div>
                                                        <div class="pt-1 flex items-center justify-between">
                                                            <div class="text-sm font-medium">{{ $uni->country }}</div>
                                                            <div class="text-sm font-small">{{ $uni->state }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                    href="#" uk-slider-item="previous"><i
                                        class="icon-feather-chevron-left"></i></a>
                                <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                    href="#" uk-slider-item="next"><i class="icon-feather-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- end australia --}}

            <!--  courses  -->
            @foreach ($courses_by_country as $country => $courses)
                <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                    <h2 class="text-2xl font-semibold"> Popular Courses in {{ $country }} </h2>
                    <a href="#" class="text-blue-500 sm:block hidden"> See all </a>
                </div>

                <div class="relative" uk-slider="finite: true">
                    <div class="uk-slider-container px-1 py-3">
                        <ul
                            class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid text-sm font-medium text-center">
                            @foreach ($courses as $course)
                                <li>
                                    <div class="card">
                                        <a href="{{ route('course.detail.frontend', $course->id) }}">
                                            <img src="{{ $course->featured_image }}" alt=""
                                                class="w-full h-52 object-cover">
                                            <div class="p-3 truncate">{{ $course->course }}</div>
                                            <div class="p-1 truncate">{{ $course->uni }}</div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                            href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                            href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

        <!--  episcodes  -->
        <!-- this is user toggle media to remove unwanted class for small devices more check docs uikit on https://getuikit.com/docs/toggle. -->
        <div class="tube-card p-4 mt-3" uk-toggle="cls: tube-card p-4; mode: media; media: 640">

            <h4 class="py-3 px-5 border-b font-semibold text-grey-700 -mx-4 -mt-3 mb-4"> Latest Information </h4>

            <div class="relative -mx-1" uk-slider="finite: true">

                <div class="uk-slider-container md:px-1 px-2 py-3">
                    <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2 uk-grid-small uk-grid">

                        @foreach (latest_info() as $info)
                            <li>
                                <a href="{{ $info->link }}">
                                    <div class="w-full md:h-40 h-28 overflow-hidden rounded-lg relative">
                                        <img src="{{ asset('frontend/images/episodes/img-2.jpg') }}" alt=""
                                            class="w-full h-full absolute inset-0 object-cover">
                                        <span
                                            class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold bg-black bg-opacity-50 text-white rounded">
                                            12:21</span>
                                        <a src="{{ $info->featured_image }}" class="w-12 h-12 uk-position-center"
                                            alt="">
                                    </div>
                                </a>
                                <div class="pt-3">
                                    <a href="episodes-watch.html" class="font-semibold line-clamp-2">{{ $info->name }}
                                    </a>
                                    <p class="text-sm pt-1"> By <a href="#"> {{ $info->creator_name }} </a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="previous">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </a>
                    <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                        href="#" uk-slider-item="next">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </a>

                </div>

            </div>

        </div>


    </div>
@endsection


@section('script')
    <script>
        $('#grid-stream').select2()
        $('#grid-board').select2()
        $('#grid-course').select2()
        $(document).ready(function() {
            $('#check-eligibility-btn').on('click', function() {
                checkEligibility();
            });

            function checkEligibility() {
                const formData = new FormData($('#eligibility-form')[0]);

                $.ajax({
                    url: '{{ route('check.eligibility') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status) {
                            // Display eligible universities
                            // const universities = data.result['eligible universities'];
                            // const universityList = $('#university-list');
                            // universityList.empty();
                            // universities.forEach(university => {
                            //     const li = $('<li>').text(university);
                            //     universityList.append(li);
                            // });

                            // // Show success message
                            // $('#success-message').text(data.message);
                            // $('#error-message').text('');
                            $('#form-check').html(data.result)
                        } else {
                            // Display error message
                            $('#error-message').text(data.message);
                            $('#success-message').text('');
                            $('#form-check').html(data.result)
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', errorThrown);
                    }
                });
            }

        });
    </script>
@endsection
