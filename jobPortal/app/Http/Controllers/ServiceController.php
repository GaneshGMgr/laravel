<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function overseaRecruitment(){
        $about = DB::table('aboutus')->get();
        $service1 = DB::table('services')->where('title','Overseas Recruitment Service')->get();

        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('frontend.services.overseasRecruitment',compact('about','serviceCategory','service1','document','aboutus_category'));
    }

    public function training(){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $service2 = DB::table('services')->where('title','Training & orientation')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();

        return view('frontend.services.training',compact('about','serviceCategory','service2','document','aboutus_category'));
    }
}
