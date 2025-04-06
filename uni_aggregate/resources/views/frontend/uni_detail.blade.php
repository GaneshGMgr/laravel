@extends('frontend.layouts.master')

@section('content')


        <div class="container p-0">

            <div class="lg:flex lg:space-x-4 lg:-mx-4">

                <div class="lg:w-9/12 lg:space-y-6">

                    <div class="tube-card">

                        <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                            <img src="{{ asset($university->featured_image) }}" alt=""
                                class="w-full h-full absolute inset-0 object-cover">
                        </div>

                        <div class="md:p-6 p-4">

                            <h1 class="lg:text-2xl text-xl font-semibold mb-6"> {{ $university->name }} </h1>

                            <div class="flex items-center space-x-3 my-3 pb-4 border-b">
                                <img src="../assets/images/avatars/avatar-2.jpg" alt="" class="w-10 rounded-full">
                                <div>
                                    <div class="text-base font-semibold"> {{ $university->country }} </div>
                                    <div class="text-xs"> {{ $university->state }} </div>
                                </div>
                            </div>

                            <div class="space-y-3">

                                <h3 class="text-xl font-semibold pt-2">Description</h3>
                                <p>
                                    {!! $university->description !!}
                                </p>

                            </div>




                        </div>

                    </div>

                    <!-- Universities in same country -->
                    <div class="tube-card md:p-6 p-3 relative">

                        <h1 class="block text-xl font-semibold"> Other universities in {{ $university->country }} </h1>

                        <div class="relative uk-slider" uk-slider="finite: true">

                            <div class="uk-slider-container px-1 py-3">
                                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-2 uk-grid-small uk-grid"
                                    style="transform: translate3d(0px, 0px, 0px);">

                                    @foreach ($universities_same_country as $same_country_uni)
                                        <li tabindex="-1" class="uk-active">
                                            <div>
                                                <a href="blog-read.html"
                                                    class="w-full md:h-32 h-28 overflow-hidden rounded-lg relative block">
                                                    <img src="{{ asset($same_country_uni->featured_image) }}" alt=""
                                                        class="w-full h-full absolute inset-0 object-cover">
                                                </a>
                                                <div class="pt-3">
                                                    <a href="{{route('university.detail.frontend',$same_country_uni->slug)}}" class="font-semibold line-clamp-2">
                                                        {{ $same_country_uni->name }}</a>
                                                    <div class="pt-2">
                                                        <p class="text-sm"> {{ $same_country_uni->country }}</p>
                                                        <div class="flex space-x-2 items-center text-xs">
                                                            <div> {{ $same_country_uni->state }}</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible"
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

                <div class="lg:w-80 w-full">

                    <div class="my-2 flex items-center justify-between pb-2">
                        <div>
                            <h2 class="text-xl font-semibold">University Authorized Consultancies</h2>
                        </div>

                    </div>
                    @foreach ($authorized_consultany as $consultancy )

                    <div class="space-y-7 mt-6">
                        <div class="p-3 bg-white shadow rounded-md flex items-center space-x-3">
                            <img src="{{asset($consultancy->featured_image)}}" class="w-20 h-24 rounded-lg -mt-7 shadow-md" alt="">
                            <div class="flex-1">
                                <a href="{{route('authorized_consultancy.frontend.detail',$consultancy->slug)}}">
                                <div class="font-semibold">{{$consultancy->name}} </div>

                            </a>
                            </div>
                            <a href="#">
                                <ion-icon name="download-outline" class="text-2xl text-gray-600"></ion-icon>
                            </a>
                        </div>


                    </div>
                    @endforeach


                    <a href="#" class="text-blue-500"> See all </a>


                </div>



            </div>

        </div>
 
@endsection
