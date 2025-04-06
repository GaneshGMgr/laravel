<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Consultancy;
use App\Models\FAQ;
use App\Models\LatestInfo;
use App\Models\Test;
use Illuminate\Http\Request;
use Exception;

use Illuminate\Support\Facades\DB;
use App\Models\University;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{


    public function index()
    {
        $uni_aus_canada = DB::table('universities')
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->select('universities.*', 'country.name as country', 'state.name as state')
            ->get();

        $universities_by_country = [];

        foreach ($uni_aus_canada as $university) {
            $universities_by_country[$university->country][] = $university;
        }

        $courses_by_country = [];
        foreach ($universities_by_country as $country => $universities) {
            $universityIds = array_column($universities, 'id');
            $courses = DB::table('courses')
                ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
                ->leftJoin('universities', 'courses.university_id', 'universities.id')
                ->whereIn('university_id', $universityIds)
                ->select('courses.*', 'course_master.name as course', 'universities.name as uni')
                ->get();
            $courses_by_country[$country] = $courses;
        }

        return view('frontend.index', compact('universities_by_country', 'courses_by_country'));
    }





    public function uni_detail($slug)
    {
        $university = University::leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->where('universities.slug', $slug)
            ->select('universities.*', 'country.name as country', 'state.name as state')
            ->first();


        if (!$university) {
            return abort(404);
        }

        $universities_same_country = University::leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->where('country.id', $university->country_id)
            ->where('universities.id', '!=', $university->id)
            ->select('universities.*', 'country.name as country', 'state.name as state')
            ->get();


        $authorized_consultany = DB::table('authorized_consultancy')
            ->leftJoin('universities', 'authorized_consultancy.university_id', 'universities.id')
            ->where('universities.id', $university->id)
            ->select('authorized_consultancy.*')
            ->get();

        return view('frontend.uni_detail', compact('university', 'universities_same_country', 'authorized_consultany'));
    }


    public function course_detail($id)
    {

        $course = DB::table('courses')
            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('universities', 'courses.university_id', 'universities.id')
            ->leftJoin('faculty', 'courses.faculty_id', 'faculty.id')
            ->where('courses.id', $id)
            ->select('courses.*', 'faculty.name as faculty', 'universities.name as university',)
            ->first();

        $related_courses = DB::table('courses')
            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->where('courses.course_master_id', $course->course_master_id)
            ->where('courses.id', '!=', $course->id)
            ->select('courses.*', 'course_master.name as course')
            ->get();


        return view('frontend.course_detail', compact(['course', 'related_courses']));
    }


    public function authorized_consultancy()
    {


        $auth_consultancy = DB::table('authorized_consultancy')


            ->paginate(5);

        return view('frontend.consultancy.list', compact(['auth_consultancy']));
    }

    public function detail_consultancy($slug)
    {


        $detail = DB::table('authorized_consultancy')->where('authorized_consultancy.slug', $slug)->first();

        $uni_id = json_decode($detail->university_id);


        return view('frontend.consultancy.detail', compact(['detail', 'uni_id']));
    }

    public function searchConsultancy(Request $request)
    {

        $query = DB::table('authorized_consultancy');

        if ($request->keyword) {
            $query->where('authorized_consultancy.name', 'like', '%'. $request->get('keyword') . '%');
            // ->orWhere('', 'like', '%' . $keyword . '%');
        }

        $auth_consultancy = $query->paginate(5);
        $auth_consultancyHtml = view('frontend.consultancy.consultancyResult', compact('auth_consultancy'))->render();
        $paginationHtml = $auth_consultancy->links()->toHtml();

        return response()->json([
            'response' => true,
            'result' => $auth_consultancyHtml,
            'pagination' => $paginationHtml,
        ]);
    }


    public function about_us()
    {
        $about = AboutUs::first();
        // dd($about);
        return view('frontend.about', compact(['about']));
    }



    public function test_detail($slug)
    {

        $detail = Test::where('slug', $slug)->first();

        return view('frontend.test', compact(['detail']));
    }


    public function faq()
    {
        $faq = FAQ::get();

        return view('frontend.faq', compact(['faq']));
    }

    public function latest_info()
    {
        $info = LatestInfo::paginate(5);    
        return view('frontend.latestInfo', compact('info'));
    }
}
