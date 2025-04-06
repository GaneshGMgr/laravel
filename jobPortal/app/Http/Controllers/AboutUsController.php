<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function index(Request $request, $slug)
    {
        $aboutUs = DB::table('aboutus')
            ->leftJoin('aboutus_category as ac', 'ac.id', 'aboutus.category_id')
            ->where('ac.slug', $slug)
            ->get();

        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();

        if ($slug == 'about_us') {
            $data_counters = DB::table('data_counters')->get();

            $view = view('frontend.aboutUs.index', compact([
                'aboutUs',
                    'serviceCategory',
                    'document',
                    'aboutus_category',
                'data_counters'
            ]));
        } else {
            $view =  view('frontend.aboutUs.messageFromChairperson', compact([
                'aboutUs',
                'serviceCategory',
                'document',
                'aboutus_category'

            ]));
        }

        return $view;
    }
    // public function aboutUs()
    // {
    //     $aboutUs = DB::table('aboutus')->where('aboutus_category', 'aboutus')->get();
    //     $serviceCategory = DB::table('services')->get();
    //     $document = DB::table('document_subtitle')->get();
    //     $aboutus_category = DB::table('aboutus_category')->get();
    //     return view('frontend.aboutUs.index', compact('aboutUs', 'serviceCategory', 'document', 'aboutus_category'));
    // }

    // public function messageFromChairperson()
    // {
    //     $about = DB::table('aboutus')->where('aboutus_category', 'messageFromChairperson')->get();
    //     $serviceCategory = DB::table('services')->get();
    //     $document = DB::table('document_subtitle')->get();
    //     $aboutus_category = DB::table('aboutus_category')->get();
    //     return view('frontend.aboutUs.messageFromChairperson', compact('about', 'serviceCategory', 'document', 'aboutus_category'));
    // }
}
