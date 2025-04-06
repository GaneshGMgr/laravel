<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function news(){
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('frontend.news.index', compact('serviceCategory',
        'document',
        'aboutus_category'));
    }
}
