<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsCategoryController extends Controller
{
    public function jobsCategoryList(){
        return view('frontend.jobsCategory.jobsList');
    }

    
}
