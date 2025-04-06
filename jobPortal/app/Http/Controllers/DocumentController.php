<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function legalDocuments (){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $legalDocumentType = DB::table('legal_documents')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('frontend.documents.legalDocument',compact('about','legalDocumentType','serviceCategory','document','aboutus_category'));
    }
    public function categoryDocuments (){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $documentType = DB::table('documents')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('frontend.documents.documentCategory',compact('about','documentType','serviceCategory','document','aboutus_category'));
    }
}
