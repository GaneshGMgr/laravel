<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('backend.index');
    }

    public function add_states(){
        return view('backend.states.add_state' );
    }


}
