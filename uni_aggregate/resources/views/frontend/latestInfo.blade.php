@extends('frontend.layouts.master')

@section('content')


    <div class="container">

        <div class="md:flex justify-between items-center mb-8">

            <div>
                <div class="text-xl font-semibold"> Courses </div>
                <div class="text-sm mt-2 font-medium text-gray-500 leading-6">  Choose from  courses  </div>
            </div>

        </div>

        <!--   Courselist  -->
        <div class="tube-card mt-3 lg:mx-0 -mx-5">

            <h4 class="py-3 px-5 border-b font-semibold text-grey-700"> <ion-icon name="star"></ion-icon> Featured today </h4>

            <div class="divide-y">



                @foreach ($info as $infos)


                <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
                    <a href="" class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
                        <img src="{{asset($infos->featured_image)}}" alt="" class="w-full h-full absolute inset-0 object-cover">

                    </a>
                    <div class="flex-1 md:space-y-2 space-y-1">
                        <a href="{{$infos->link}}" class="md:text-xl font-semibold line-clamp-2"> {{$infos->name}} </a>
                        <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> </p>
                        <a href="#" class="md:font-semibold block text-sm"> {{$infos->creator_name}}</a>

                    </div>
                </div>

                @endforeach




            </div>

        </div>

        <!-- Pagination -->

            <div class="flex justify-center mt-9 space-x-2 text-base font-semibold text-gray-400 items-center">

                {!! $info->links() !!}

        </div>



    </div>



@endsection


