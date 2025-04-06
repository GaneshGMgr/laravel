<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryListController extends Controller
{
    public function countryList(){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $country = DB::table('country')->get();
        $aboutus_category = DB::table('aboutus_category')->get();

        return view('frontend.country.index', compact('about','country','serviceCategory','document','aboutus_category'));
    }
}
