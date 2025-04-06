<?php

namespace App\Http\Controllers;

use App\Models\CourseByUni;
use App\Models\Faculty;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CoursesController extends Controller
{

    public function index()
    {

        $courses = DB::table('courses')
            ->leftJoin('faculty', 'courses.faculty_id', 'faculty.id')
            ->leftJoin('level', 'courses.level_id', 'level.id')
            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('universities', 'faculty.university_id', 'universities.id')
            ->leftJoin('stream','courses.stream_id','stream.id')
            ->select(
                'course_master.name as course_name',
                'courses.duration',
                'courses.credit_hours',
                'faculty.name as faculty_name',
                'level.name as level_name',
                'universities.name as universities',
                'stream.name as stream_name'
            )
            ->get();
        // dd($courses->all());
        return view('backend.courses.index', compact('courses'));
    }


    public function datatables(Request $request): JsonResponse
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];
        /*Total records*/
        $totalRecords = CourseByUni::select('count(*) as allcount')->count();
        $query = CourseByUni::orderBy($columnName, $columnSortOrder)
            ->leftJoin('faculty', 'courses.faculty_id', 'faculty.id')
            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('level', 'courses.level_id', 'level.id')
            ->leftJoin('universities', 'courses.university_id', 'universities.id')
            ->leftJoin('stream','courses.stream_id','stream.id')



            ->where('course_master.name', 'like', '%' . $searchValue . '%')
            ->orWhere('faculty.name', 'like', '%' . $searchValue . '%')
            ->orWhere('level.name', 'like', '%' . $searchValue . '%')
            ->orWhere('courses.duration', 'like', '%' . $searchValue . '%')
            ->orWhere('courses.credit_hours', 'like', '%' . $searchValue . '%')
            ->orWhere('universities.name', 'like', '%' . $searchValue . '%')
            ->orWhere('stream.name', 'like', '%' . $searchValue . '%')


            ->select('courses.*', 'universities.name as uni_name',
             'faculty.name as faculty_name',
              'level.name as level_name',
              'stream.name as stream_name',
              'course_master.name as course_name'
            )
            ->get();


        /*Fetch records*/


        $totalRecordswithFilter = $query->count();
        if ($request->length == -1) {
            $records = $query->take($rowperpage);
        } else {
            $records = $query->skip($start)->take($rowperpage);
        }


        $data_arr = array();
        $i = $start + 1;
        foreach ($records as $record) {
            $id = $i;
            $name = $record->course_name;
            $faculty_name = $record->faculty_name;
            $level_name = $record->level_name;
            $duration = $record->duration;
            $credit_hours = $record->credit_hours;
            $university_name = $record->uni_name;
            $stream_name = $record->stream_name;


            $data_arr[] = array(
                "id" => $i,
                "course_master_id" => $name,
                "faculty_id" => $faculty_name,
                "level_id" => $level_name,
                "duration" => $duration,
                "credit_hours" => $credit_hours,
                "university" => $university_name,
                "stream_id" => $stream_name,
                "course_cost"=>$record->course_cost,


                'action' => "<a href='" . route('course.edit', $record->id) . "'
                class='btn btn-sm btn-success edit-item-btn'>Edit</a>
                <button class='btn btn-sm btn-danger remove-item-btn' onclick='removeItem({{ $record->id }})'> Remove</button> ",
            );
            $i++;
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return Response::json($response);
    }

    public function add_courses()
    {

        $view_courses = DB::table('courses')->get();



        return view('backend.courses.add', compact('view_courses'));
    }

    public function save_add_course(Request $request): JsonResponse
    {

        // dd($request->all());
        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {


            $validate =  Validator::make($request->all(), [
                "courses" => ['required'],
                "faculty" => ['required'],
                "level" => ['required'],
                "description" => ['required', 'min:6'],
                "duration" => ['required','numeric'],
                "university" => ['required'],
                "credit_hours" => ['required','numeric'],
                "stream" =>['required'],
                "course_cost" =>['required','numeric'],
                "intake" => ['required'],
                "feature_image" => ['required'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new \Exception("Form Validaton Error");
            }



            DB::table('courses')->insert([
                'course_master_id' => $request->courses,
                'faculty_id' => $request->faculty,
                'level_id' => $request->level,
                'duration' => $request->duration,
                'description' => $request->description,
                'credit_hours' => $request->credit_hours,
                'university_id'=>$request->university,
                'stream_id'=>$request->stream,
                'course_cost'=>$request->course_cost,
                'intake'=>$request->course_cost,
                'feature_image'=>$request->feature_image,
                // 'slug' => Str::slug($request->name),
            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('courses.index');

        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function fetchFaculties(Request $request)
    {
        $output = [
            'response' => false,
            'result' => '',
            'msg' => 'something went wrong'
        ];

        try {

            $universityId = $request->input('university_id');

            // Query the faculties based on the selected university ID
            $faculties = DB::table('faculty')->where('university_id', $universityId)->get();
            // Prepare the response data
            $output['response'] = true;
            $output['result'] = $faculties;
            $output['msg'] = '';

        } catch (Exception $e) {
            $output['msg'] = $e->getMessage();
        }

        return Response::json($output);
    }

    public function edit($id)
    {

        $edit_courses = DB::table('courses')
            ->leftJoin('faculty', 'courses.faculty_id', 'faculty.id')
            ->leftJoin('course_master', 'courses.course_master_id', 'course_master.id')
            ->leftJoin('level', 'courses.level_id', 'level.id')
            ->leftJoin('universities', 'courses.university_id', 'universities.id')
            ->where('courses.id',$id)
            ->select(
                'course_master.name as course_name',
                'courses.*',
                'faculty.name as faculty_name',
                'level.name as level_name',
                'universities.name as universities',

            )
            ->first();
            // dd($edit_courses);

            return view('backend.courses.edit',compact('edit_courses'));
    }

    public function edit_save(Request $request,$id): JsonResponse
    {
        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {
            // dd($request->all());

            $validate =  Validator::make($request->all(), [
                "courses" => ['required'],
                "faculty" => ['required'],
                "level" => ['required'],
                "description" => ['required', 'min:6'],
                "duration" => ['required','numeric'],
                "university" => ['required'],
                "credit_hours" => ['numeric', 'required'],
                "course_cost" => ['required', 'numeric'],
                "intake" => ['required'],
                "feature_image" => ['required'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }

            DB::table('courses')
                ->where('id', $id)
                ->update([
                    'course_master_id' => $request->courses,
                    'faculty_id' => $request->faculty,
                    'level_id' => $request->level,
                    'duration' => $request->duration,
                    'description' => $request->description,
                    'credit_hours' => $request->credit_hours,
                    'university_id'=>$request->university,
                    'course_cost'=>$request->intake,
                    'intake'=>$request->course_cost,
                    'feature_image'=>$request->feature_image,
                ]);

            $response['status'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('courses.index');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function removeItem(Request $request)
    {

        $response=[
            'response'=>false,
            'msg'=>'Something went wrong',
            'result'=>[],
        ];
        try{
            $item = CourseByUni::where('slug',$request->slug)->first();
            if (!$item) {
                $response['response'] = false;
                $response['msg'] = 'item not found';
            }else{
                $item->delete();
                $response['response'] = true;
                $response['msg'] = 'item removed successfully ';
            }

        }
        catch(Exception $expection)
        {

            $response['msg'] = $expection->getMessage();
        }

        return Response::json($response);
    }




}
