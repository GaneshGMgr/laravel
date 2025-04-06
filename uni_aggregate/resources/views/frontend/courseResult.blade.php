@if ($course_list instanceof \Illuminate\Pagination\LengthAwarePaginator)

    @foreach ($course_list as $courses_list)
        <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
            <a href="{{ route('course.detail.frontend', $courses_list->id) }}"
                class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                <img src="{{ asset($courses_list->featured_image) }}" alt=""
                    class="w-full h-full absolute inset-0 object-cover">

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

   <!-- Pagination -->
   <div class="flex justify-center mt-9 space-x-2 text-base font-semibold text-gray-400 items-center" id="pagination-links">

    {!! $course_list->links() !!}

</div>
@endif

@if ($course_list->isEmpty())
    <div>
        <h2 class="text-2xl font-semibold">


            Sorry no courses found based on your search.
        </h2>

    </div>
@endif
