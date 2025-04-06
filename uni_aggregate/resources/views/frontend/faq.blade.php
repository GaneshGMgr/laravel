@extends('frontend.layouts.master')


@section('content')
    <div class="py-12">
        <div class="container lg:w-10/12">

            <h1 class="text-2xl font-semibold mb-4"> Questions</h1>
            <ul class="uk-accordion space-y-2" uk-accordion="">
                @foreach ($faq as $faqs)

                <li class="bg-white px-6 py-4 rounded shadow hover:shadow-md">
                    <a class="uk-accordion-title text-base" href="#">{{ $faqs->question }}</a>
                    <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                        <p> {{ $faqs->answer }} </p>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

    </div>
@endsection
