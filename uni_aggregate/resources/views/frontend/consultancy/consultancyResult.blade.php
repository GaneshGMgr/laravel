@if ($auth_consultancy instanceof \Illuminate\Pagination\LengthAwarePaginator)
@foreach ($auth_consultancy as $consultancy)
<div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
    <a href=""
        class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
        <img src="{{ asset($consultancy->featured_image) }}" alt=""
            class="w-full h-full absolute inset-0 object-cover">

    </a>
    <div class="flex-1 md:space-y-2 space-y-1">
        <a href="" class="md:text-xl font-semibold line-clamp-2"> {{ $consultancy->name }}
        </a>
        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> </p>

        <div class="flex items-center justify-between">
            <div class="flex space-x-2 items-center text-sm">
                <div> {{ $consultancy->email }} </div>

            </div>
            <a href="{{ route('authorized_consultancy.frontend.detail', $consultancy->slug) }}"
                class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                See more detail </a>
        </div>


    </div>
</div>
@endforeach

<div class="flex justify-center mt-9 space-x-2 text-base font-semibold text-gray-400 items-center" id="pagination-links">

    {!! $auth_consultancy->links() !!}

</div>
@endif



@if ($auth_consultancy->isEmpty())

<div>
    <h2 class="text-2xl font-semibold">


        Sorry no Consultancy found based on your search.
    </h2>

</div>

@endif
