@extends('frontend.layouts.master')

@section('content')
    <div class="container p-0">

        <div class="lg:flex lg:space-x-4 lg:-mx-4">

            <div class="lg:w-9/12 lg:space-y-6">

                <div class="tube-card">

                    <div class="h-44 mb-4 md:h-72 overflow-hidden relative rounded-t-lg w-full">
                        <img src="{{ asset($detail->featured_image) }}" alt=""
                            class="w-full h-full absolute inset-0 object-cover">
                    </div>

                    <div class="md:p-6 p-4">

                        <h1 class="lg:text-2xl text-xl font-semibold mb-6"> {{ $detail->name }} </h1>

                        <div class="flex items-center space-x-3 my-3 pb-4 border-b">
                            <div>
                                <div class="text-base font-semibold"> </div>
                                <div class="text-xs"> </div>
                            </div>
                        </div>

                        <div class="space-y-3">

                            <h3 class="text-xl font-semibold pt-2">Description</h3>
                            <p>
                            </p>
                            <p>{!! $detail->description !!}</p>
                            <p></p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="lg:w-80 w-full">

                <div class="my-2 flex items-center justify-between pb-2">
                    <div>
                        <h2 class="text-xl font-semibold">Universities Affiliated</h2>
                    </div>
                </div>

                @foreach ($uni_id as $item)
                    @php
                        $uni = DB::table('universities')
                            ->where('id', $item)
                            ->first();
                    @endphp

                    <div class="space-y-7 mt-6">
                        <div class="p-3 bg-white shadow rounded-md flex items-center space-x-3">
                            <img src="{{ asset($uni->featured_image) }}" class="w-20 h-24 rounded-lg -mt-7 shadow-md"
                                alt="">
                            <div class="flex-1">
                                <a href="{{ route('university.detail.frontend', $uni->slug) }}">
                                    <div class="font-semibold">{{ $uni->name }} </div>

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
