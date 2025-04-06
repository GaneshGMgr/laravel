@extends('frontend.layouts.master')

@section('content')
    <div class="container">

        <div class="md:flex justify-between items-center mb-8">

            <div>
                <div class="text-xl font-semibold"> Courses </div>
                <div class="text-sm mt-2 font-medium text-gray-500 leading-6"> Choose from courses </div>
            </div>
            <!-- Search Bar -->
            <div class="md:w-1/3 flex items-center mt-4 md:mt-0">
                <form action="{{ route('courses.search') }}" id="search-form" method="post">
                    @csrf
                    <input type="text" name="keyword"
                        class="w-full px-4 py-2 rounded-md border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none"
                        placeholder="Search courses" />
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-200 focus:outline-none"
                        id="save">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <!--   Courselist  -->
        <div class="tube-card mt-3 lg:mx-0 -mx-5">

            <h4 class="py-3 px-5 border-b font-semibold text-grey-700"> <ion-icon name="star"></ion-icon> Featured today
            </h4>

            <div class="divide-y" id="form-check">



                @foreach ($course_list as $courses_list)
                    <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                        <a href="{{ route('course.detail.frontend', $courses_list->id) }}"
                            class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                            <img src="{{ asset($courses_list->featured_image) }}" alt=""
                                class="w-full h-full absolute inset-0 object-cover">
                            <img src="https://demo.foxthemes.net/courseplus/assets/images/icon-play.svg"
                                class="w-12 h-12 uk-position-center" alt="">
                        </a>
                        <div class="flex-1 md:space-y-2 space-y-1">
                            <a href="{{ route('course.detail.frontend', $courses_list->id) }}"
                                class="md:text-xl font-semibold line-clamp-2"> {{ $courses_list->name }} </a>
                            <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> </p>
                            <a href="#" class="md:font-semibold block text-sm"> {{ $courses_list->uni }}</a>
                            <div class="flex items-center justify-between">
                                <div class="flex space-x-2 items-center text-sm">
                                    <div> {{ $courses_list->country }} </div>

                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach




            </div>

        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-9 space-x-2 text-base font-semibold text-gray-400 items-center" id="">

            {!! $course_list->links() !!}

        </div>


    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {

            $("#search-form").submit(function(event) {

                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                             $('#form-check').html(responseData.result);
                            $('#pagination-links').html(responseData.pagination);
                    }, function(error) {

                        window.ct.populateFormError("#search-form", error.result)
                    })
                }
                return false
            })
        });
    </script>
@endsection
