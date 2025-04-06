<?php

use App\Models\Board;
use App\Models\CourseByUni;
use App\Models\CourseMasterModel;
use App\Models\LatestInfo;
use App\Models\Level;
use App\Models\SiteSetting;
use App\Models\Stream;
use App\Models\Test;
use App\Models\University;
use Illuminate\Support\Facades\DB;


function country(){

    return DB::table('country')->get();

}

function university(){
    return DB::table('universities')->get();
}
function faculty(){
    return DB::table('faculty')->get();
}
function getCountryName($id){

    return DB::table('country')->where('id',$id)->first()->name;

}
function getfacultyName($id){

    return DB::table('faculty')->where('id',$id)->first()->name;

}
function getLevelName($id){

    return DB::table('faculty')->where('id',$id)->first()->name;

}
function getUniversityName($id){

    return DB::table('university')->where('id',$id)->first()->name;

}

function levelName(){
    return Level::get();
}
function streamName(){
    return Stream::get();
}

function board(){
    return Board::get();
}
function state(){
    return DB::table('state')->get();
}
function course_master(){
    return CourseMasterModel::get();
}

function getUniSlug($slug)
{
    return University::leftJoin('country', 'universities.country_id', 'country.id')
    ->leftJoin('state', 'universities.state_id', 'state.id')
    ->where('universitites.slug',$slug)
    ->select('universities.*', 'country.name as country', 'state.name as state')
    ->get();

}


function latest_info(){

    return LatestInfo::get();
}

function test(){

    return Test::get();
}

function coursesByUni(){
    return CourseByUni::get();
}


function siteSetting(){
    return SiteSetting::first();
}

