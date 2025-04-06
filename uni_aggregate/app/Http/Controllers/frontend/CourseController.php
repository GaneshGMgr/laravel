<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseByUni;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    public function course_list()
    {

        $course_list = DB::table('courses')

            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('country', 'course_master.country_id', 'country.id')
            ->leftJoin('universities', 'courses.university_id', 'universities.id')
            ->select('courses.*', 'universities.name as uni', 'country.name as country', 'course_master.name')
            ->paginate(5);



        return view('frontend.course_list', compact('course_list'));
    }

    public function course_search(Request $request)
    {
        $query = CourseByUni::leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('country', 'course_master.country_id', 'country.id')
            ->leftJoin('universities', 'courses.university_id', 'universities.id')
            ->select('courses.*', 'universities.name as uni', 'country.name as country', 'course_master.name');

        if ($request->keyword) {
            $query->where('course_master.name', 'like', "%" . $request->get('keyword') . "%");
            $query->where('universities.name', 'like', "%" . $request->get('keyword') . "%");
            $query->where('country.name', 'like', "%" . $request->get('keyword') . "%");
            $query->where('country.name', 'like', "%" . $request->get('keyword') . "%");
        }

        $course_list = $query->paginate(5);

        $course_listHtml = view('frontend.courseResult', compact('course_list'))->render();
        $paginationHtml = $course_list->links()->toHtml();

        return response()->json([
            'response' => true,
            'result' => $course_listHtml,
            'pagination' => $paginationHtml,
        ]);
    }

}
