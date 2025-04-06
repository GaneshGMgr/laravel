<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseByUni;
use App\Models\Eligibility;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class EligibilityChecker extends Controller
{
    public function check(Request $request): JsonResponse
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {

            $validate = Validator::make($request->all(), [
                'age' => ['required', 'numeric'],
                'stream' => ['required'],

                'board' => ['required'],
                'gpa' => ['required', 'numeric', 'between:1,4', 'digits_between:1,4'],


                'course' => ['required'],


            ]);
            if ($validate->fails()) {
                $response['msg'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            $boardId = $request->input('board');
            $streamId = $request->input('stream');
            $courseId = $request->input('course');
            $gpa = $request->input('gpa');
            $age = $request->input('age');


            $eligibility =Eligibility::where('board_id', $boardId)
                ->where('stream_id', $streamId)
                ->where('course_id', $courseId)
                ->where('min_gpa', '<=', $gpa)
                ->where('min_age', '<=', $age)
                ->exists();


            if ($eligibility) {
                $eligible_uni = CourseByUni::leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
                    ->leftJoin('universities', 'courses.university_id', 'universities.id')

                    ->where('courses.course_master_id', $courseId)
                    ->select(
                        'courses.*',
                        'universities.name as uni_name',
                        'universities.slug as uni_slug',

                    )
                    ->get();
                    // dd($eligible_uni);
                // $eligible_universities = $eligible_uni->pluck('uni_name', 'uni_slug');
                $view = view('frontend.eligibilityResults', compact('eligible_uni'))->render();


                return response()->json([
                    'status' => true,
                    'message' => 'Congratulations! You are eligible for this course in the universities below.',
                    'result' => $view
                ]);
            } else {

                $eligible_uni = [];

                $view = view('frontend.eligibilityResults', compact('eligible_uni'))->render();
                return response()->json([
                    'status' => false,
                    'message' => 'Sorry, you are not eligible for this course.',
                    'result'=>$view
                ]);
            }
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }


    public function result()
    {

        return view('frontend.eligibilityResults');
    }
}
