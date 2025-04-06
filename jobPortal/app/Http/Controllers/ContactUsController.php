<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function contactUs (){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('frontend.contactUs.index',compact('about','serviceCategory','document','aboutus_category'));
    }
}
