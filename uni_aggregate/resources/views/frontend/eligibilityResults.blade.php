
@if ($eligible_uni)


<div class="sm:my-4 my-3 flex items-end justify-between pt-3">
    <h2 class="text-2xl font-semibold">Your are eligible for in universities below</h2>
    <a href="#" class="text-blue-500 sm:block hidden">See all</a>
</div>

<div class="mt-3">


    <!--  slider -->
    <div class="mt-3">


        <div class="relative" uk-slider="finite: true">
            <div class="uk-slider-container px-1 py-3">
                <ul
                    class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid">
                    @foreach ($eligible_uni as $uni)
                        <li>
                            <a href="{{ route('university.detail.frontend', $uni->uni_slug) }}"
                                class="uk-link-reset">
                                <div class="card uk-transition-toggle">
                                    <div class="card-media h-40">
                                        <div class="card-media-overly"></div>
                                        <img src="{{ $uni->featured_image }}" alt=""
                                            class="">
                                        <span class="icon-play"></span>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="font-semibold line-clamp-2">{{ $uni->uni_name }}
                                        </div>
                                        <div class="pt-1 flex items-center justify-between">
                                            {{-- <div class="text-sm font-medium">{{ $uni->country }}</div>
                                            <div class="text-sm font-small">{{ $uni->state }}</div> --}}
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
                    href="#" uk-slider-item="next"><i
                        class="icon-feather-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>

@endif



@if (!$eligible_uni)
    <div>
        <h2 class="text-2xl font-semibold">


            Sorry we didnt find any eligible universities based on your input
        </h2>

    </div>
@endif





