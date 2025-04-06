 <!-- sidebar -->
 <div class="sidebar">
     <div class="sidebar_inner" data-simplebar>

         <ul class="side-colored">

             <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">
                     <ion-icon name="compass"
                         class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                     </ion-icon>
                     <span> Home</span>
                 </a>
             </li>
             <li class="{{ request()->is('/course_list') ? 'active' : '' }}"><a href="{{ route('courses.list') }}">
                     <ion-icon name="compass"
                         class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                     </ion-icon>
                     <span> Courses</span>
                 </a>
             </li>
             @foreach (country() as $country)
                 <li class="">
                     <a href="{{ route('uni.list', $country->slug) }}">
                         <ion-icon name="compass"
                             class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                         </ion-icon>
                         <span> University in {{ Str::ucfirst($country->name) }}</span>
                     </a>
                 </li>
             @endforeach

             <li class=""><a href="{{route('latestInfo.index')}}">
                     <ion-icon name="compass"
                         class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                     </ion-icon>
                     <span> Latest News</span>
                 </a>
             </li>
             <li class="{{ request()->is('/authorizedConsultancy/list') ? 'active' : '' }}"><a
                     href="{{ route('authorized_consultancy.frontend') }}">
                     <ion-icon name="compass"
                         class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                     </ion-icon>
                     <span> Authorized Consultancies</span>
                 </a>
             </li>


         </ul>

         <ul class="side_links" data-sub-title="Information">
             <li><a href="{{route('aboutUs.Index')}}">
                     <ion-icon name="card-outline" class="side-icon"></ion-icon> About Us
                 </a></li>


             @foreach (test() as $test)
                 <li><a href="{{route('test.frontend.detail',$test->slug)}}">
                         <ion-icon name="card-outline" class="side-icon"></ion-icon> {{ $test->name }}
                     </a></li>
             @endforeach
             <li><a href="{{route('faq.index')}}">
                     <ion-icon name="card-outline" class="side-icon"></ion-icon> Faq
                 </a></li>
             {{-- <li><a href="page-pricing.html">
                     <ion-icon name="card-outline" class="side-icon"></ion-icon> Fourms
                 </a></li>
             <li><a href="page-pricing.html">
                     <ion-icon name="card-outline" class="side-icon"></ion-icon> Career
                 </a></li>
             <li><a href="page-pricing.html">
                     <ion-icon name="card-outline" class="side-icon"></ion-icon> Education Loan
                 </a></li> --}}



         </ul>


     </div>

     <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>
 </div>
