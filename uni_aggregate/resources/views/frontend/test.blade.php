@extends('frontend.layouts.master')

@section('content')
    <div class="lg:flex lg:space-x-10 bg-white rounded-md shadow max-w-3x  mx-auto md:p-8 p-3">


            <div class="container">

                <div class="max-w-3xl lg:p-8 pb-0 mx-auto">

                    <!-- article content -->
                    <div class="md:space-y-4 space-y-3 leading-8 md:text-base">


                        <div class="font-semibold md:text-3xl text-2xl text-gray-700 pt-5"> {{$detail->name}} </div>
                       

                        <div class="font-semibold md:text-2xl text-xl text-gray-700 md:pt-12 pt-10"> Details
                        </div>
                        <div class="md:leading-9"> {!!$detail->description!!}
                        </div>


                    </div>


                </div>

            </div>



    </div>
@endsection
