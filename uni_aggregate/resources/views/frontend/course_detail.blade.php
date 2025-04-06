    @extends('frontend.layouts.master')


    @section('content')
        <div class="container p-0">

            <div class="md:rounded-b-lg md:-mt-8 md:pb-8 md:pt-12 p-8 relative overflow-hidden"
                style="background-image: url('{{ asset($course->featured_image) }}'); background-size: cover; background-position: center;">



                <div class="lg:w-9/12 relative z-10">


                    <ul class="lg:flex items-center text-gray-200">
                        <li> Created by <a href="#" class="text-white fond-bold hover:underline hover:text-white">
                                {{ $course->university }} </a> </li>
                        <li> <span class="lg:block hidden mx-3 text-2xl">·</span> </li>
                        <li> Intake {{ $course->intake }} </li>
                    </ul>

                </div>

                <img src="../assets/images/courses/course-intro.png" alt=""
                    class="-bottom-1/2 absolute right-0 hidden lg:block">

            </div>

            <div class="lg:flex lg:space-x-4 mt-4">
                <div class="lg:w-8/12 space-y-4">

                    <!-- course description -->
                    <div class="tube-card p-6" id="Overview">

                        <div class="space-y-7">
                            <div>
                                <h3 class="text-lg font-semibold mb-3"> Description </h3>
                                <p>
                                    {!! $course->description !!}
                                </p>
                            </div>
                      

                        </div>

                    </div>

                    <!-- course Curriculum -->
                    {{-- <div id="curriculum">
                        <h3 class="mb-4 text-xl font-semibold"> Course Curriculum </h3>
                        <ul uk-accordion="multiple: true" class="tube-card p-4 divide-y space-y-3 uk-accordion">

                            <li class="uk-open">
                                <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">  <div class="mb-1 text-sm font-medium"> Section 1 </div> Html Introduction </a>
                                <div class="uk-accordion-content mt-3 text-base" aria-hidden="false">

                                    <ul class="course-curriculum-list font-medium">
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> Introduction <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> What is HTML <span class="text-sm ml-auto"> 5 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            What is a Web page? <span class="text-sm ml-auto"> 8 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Your First Web Page
                                            <a href="#trailer-modal" class="bg-gray-200 ml-4 px-2 py-1 rounded-full text-xs" uk-toggle=""> Preview </a>
                                            <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Brain Streak <span class="text-sm ml-auto"> 5 min </span>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li class="pt-2">
                                <a class="uk-accordion-title text-md mx-2 font-semibold" href="#"> <div class="mb-1 text-sm font-medium"> Section 2 </div> Your First webpage  </a>
                                <div class="uk-accordion-content mt-3 text-base" hidden="" aria-hidden="true">

                                    <ul class="course-curriculum-list font-medium">
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> Headings
                                            <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> Paragraphs
                                            <span class="text-sm ml-auto"> 5 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Emphasis and Strong Tag
                                            <span class="text-sm ml-auto"> 8 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Brain Streak
                                            <a href="#trailer-modal" class="bg-gray-200 ml-4 px-2 py-1 rounded-full text-xs" uk-toggle=""> Preview </a>
                                            <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Live Preview Feature
                                            <span class="text-sm ml-auto"> 5 min </span>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li class="pt-2">
                                <a class="uk-accordion-title text-md mx-2 font-semibold" href="#"> <div class="mb-1 text-sm font-medium"> Section 3 </div> Build Complete Webste  </a>
                                <div class="uk-accordion-content mt-3 text-base" hidden="" aria-hidden="true">

                                    <ul class="course-curriculum-list font-medium">
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> The paragraph tag
                                            <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon> The break tag
                                            <span class="text-sm ml-auto"> 5 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Headings in HTML
                                            <span class="text-sm ml-auto"> 8 min </span>
                                        </li>
                                        <li class="hover:bg-gray-200 p-2 flex rounded">
                                            <ion-icon name="play-circle" class="text-2xl mr-2"></ion-icon>
                                            Bold, Italics Underline
                                            <a href="#trailer-modal" class="bg-gray-200 ml-4 px-2 py-1 rounded-full text-xs" uk-toggle=""> Preview </a>
                                            <span class="text-sm ml-auto"> 4 min </span>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div> --}}

                    <!-- course Faq -->
                    {{-- <div id="faq" class="tube-card p-5">
                        <h3 class="text-lg font-semibold mb-3"> Course Faq </h3>
                        <ul uk-accordion="multiple: true" class="divide-y space-y-3 uk-accordion">
                            <li class="bg-gray-100 px-4 py-3 rounded-md uk-open">
                                <a class="uk-accordion-title font-semibold text-base" href="#"> Html Introduction </a>
                                <div class="uk-accordion-content mt-3" aria-hidden="false">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>
                            <li class="bg-gray-100 px-4 py-3 rounded-md">
                                <a class="uk-accordion-title font-semibold text-base" href="#"> Your First webpage</a>
                                <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>
                            <li class="bg-gray-100 px-4 py-3 rounded-md">
                                <a class="uk-accordion-title font-semibold text-base" href="#"> Some Special Tags </a>
                                <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>
                            <li class="bg-gray-100 px-4 py-3 rounded-md">
                                <a class="uk-accordion-title font-semibold text-base" href="#"> Html Introduction </a>
                                <div class="uk-accordion-content mt-3" hidden="" aria-hidden="true">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>
                        </ul>
                    </div> --}}

                    <!-- course Announcement -->
                    {{-- <div id="announcement" class="tube-card p-5">
                        <h3 class="text-base font-semibold mb-3"> Announcement </h3>

                        <div class="flex items-center gap-x-4 mb-5">
                            <img src="../assets/images/avatars/avatar-4.jpg" alt="" class="rounded-full shadow w-12 h-12">
                            <div>
                                <h4 class="-mb-1 text-base"> Stella Johnson</h4>
                                <span class="text-sm"> Instructor <span class="text-gray-500"> 1 year ago </span> </span>
                            </div>
                        </div>

                        <h4 class="leading-8 text-xl"> Nam liber tempor cum soluta nobis eleifend option congue imperdiet
                            doming id quod  .</h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam
                            liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim
                            placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                            minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
                            commodo consequat.</p>

                    </div> --}}

                    <!-- course Reviews -->



                </div>

                <!-- course intro Sidebar -->
                <div class="lg:w-4/12 space-y-4 lg:mt-0 mt-4">

                    <div uk-sticky="top:600;offset:; offset:90 ; media: 1024" class="uk-sticky" style="">
                        <div class="tube-card p-5 uk-sticky" uk-sticky="top:600;offset:; offset:90 ; media: @s"
                            style="">

                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <div class="text-3xl font-semibold"> {{ $course->duration }} yrs </div>
                                    <div> Duration</div>
                                    <ion-icon name="time" class="text-lg" hidden=""></ion-icon>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <div class="text-3xl font-semibold"> {{ $course->credit_hours }} </div>
                                    <div> Credit hours </div>

                                </div>
                            </div>



                        </div>
                        <div class="uk-sticky-placeholder" style="height: 324px; margin: 0px;" hidden=""></div>
                        <div class="mt-4">
                            <a href="course-watch.html"
                                class="flex items-center justify-center h-9 px-6 rounded-md bg-blue-600 text-white">
                                Enroll Now </a>
                        </div>
                    </div>
                    <div class="uk-sticky-placeholder" style="height: 376px; margin: 0px;" hidden=""></div>

                    <div class="tube-card p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h4 class="text-lg -mb-0.5 font-semibold"> Related Courses </h4>
                            </div>
                            <a href="#" class="text-blue-600">
                                <ion-icon name="refresh"
                                    class="-mt-0.5 -mr-2 hover:bg-gray-100 p-1.5 rounded-full text-lg"></ion-icon>
                            </a>
                        </div>
                        <div class="p-1">
                            @foreach ($related_courses as $related_course)
                                <a href="{{ route('course.detail.frontend', $related_course->id) }}"
                                    class="-mx-3 block hover:bg-gray-100 p-2 rounded-md">
                                    <div class="flex items-center space-x-3">
                                        <img src="../assets/images/courses/img-2.jpg" alt=""
                                            class="h-12 object-cover rounded-md w-12">
                                        <div class="line-clamp-2 text-sm font-medium">

                                            {{ $related_course->course }}

                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                        <a href="#"
                            class="hover:bg-gray-100 -mb-1.5 mt-0.5 h-8 flex items-center justify-center rounded-md text-blue-400 text-sm">
                            See all
                        </a>
                    </div>

                </div>
            </div>

        </div>
    @endsection
