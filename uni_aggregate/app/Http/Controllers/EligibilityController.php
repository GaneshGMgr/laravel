<?php

namespace App\Http\Controllers;

use App\Models\Eligibility;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EligibilityController extends Controller
{
    public function specifyEligibility()
    {

        return view('backend.eligibility.specify');
    }

    public function fetchUniversitites(Request $request)
    {

        $output = [
            'response' => false,
            'result' => '',
            'msg' => 'Something went wrong'
        ];

        try {
            $countryId = $request->input('country_id');

            $universities = DB::table('universities')->where('country_id', $countryId)->get();

            $output['response'] = true;
            $output['result'] = $universities;
            $output['msg'] = '';
        } catch (Exception $e) {
            $output['msg'] = $e > getMessage();
        }

        return Response::json($output);
    }

    public function fetchCourses(Request $request)
    {
        $output = [

            'response' => false,
            'result' => '',
            'msg' => 'Something went wrong'
        ];

        try {
            $universityId = $request->input('university_id');

            $courses = DB::table('courses')->where('university_id', $universityId)->get();

            $output['response'] = true;
            $output['result'] = $courses;
            $output['msg'] = '';
        } catch (Exception $e) {
            $output['msg'] = $e > getMessage();
        }

        return Response::json($output);
    }

    public function save_specifyEligibility(Request $request)
    {


        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];

        try {
            // dd($request->all());

            $validate = Validator::make($request->all(), [

                "stream"=>['required'],

                "courses" => ['required'],
                "age" => ['required'],
                "board" => ['required'],
                "gpa" => ['required'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }

            Eligibility::insert([
                    'stream_id'=>$request->stream,


                    'course_id' => $request->courses,
                    'min_age' => $request->age,
                    'min_gpa' => $request->gpa,
                    'board_id' => $request->board,
                ]);
            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('eligibility.index');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }


    public function edit($id)
    {

        $edit_eligibility = Eligibility::leftJoin('board', 'eligibility.board_id', 'board.id')
            ->leftJoin('stream', 'eligibility.stream_id', 'stream.id')

            ->leftJoin('course_master', 'eligibility.course_id', 'course_master.id')

            ->where('eligibility.id', $id)
            ->select(
                'board.name as board',

                'stream.name as stream',
                'course_master.name as course',

                'eligibility.*'
            )
            ->first();

        return view('backend.eligibility.edit', compact('edit_eligibility'));
    }

    public function save_edit(Request $request,$id): JsonResponse
    {
        $response = [
            'response' => false,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {
            $validate = Validator::make($request->all(), [


                "courses" => ['required'],
                "age" => ['required'],
                "board" => ['required'],
                "stream"=>['required'],
                "gpa" => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            Eligibility::where('id',$id)
            ->update([
                'stream_id'=>$request->stream,

                'course_id' => $request->courses,
                'min_age' => $request->age,
                'min_gpa' => $request->gpa,
                'board_id' => $request->board,
            ]);

            $response['response'] = true;
            $response['msg'] = 'Form saved successfully';
            $response['result'] = route('eligibility.index');
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
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
        $totalRecords = Eligibility::select('count(*) as allcount')->count();
        $query = Eligibility::orderBy($columnName, $columnSortOrder)
            ->leftJoin('board', 'eligibility.board_id', 'board.id')
            ->leftJoin('stream', 'eligibility.stream_id', 'stream.id')
            ->leftJoin('course_master', 'eligibility.course_id', 'course_master.id')




            ->where('course_master.name', 'like', '%' . $searchValue . '%')
            ->orWhere('board.name', 'like', '%' . $searchValue . '%')
            ->select(
                'board.name as board',
                'course_master.name as course',
                'stream.name as stream',
                'eligibility.*'
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
            $age = $record->min_age;
            $gpa = $record->min_gpa;

            $course = $record->course;
            $stream = $record->stream;

            $board = $record->board;


            $data_arr[] = array(
                "id" => $i,
                "min_age" => $age,
                "min_gpa" => $gpa,

                "course_id" => $course,
                "stream_id" => $stream,

                "board_id" => $board,

                'action' => "<a href='" . route('edit.eligibility', $record->id) . "'
                class='btn btn-sm btn-success edit-item-btn'>Edit</a>
                 <button class='btn btn-sm btn-danger remove-item-btn' onclick=deleteItem('$record->id')> Remove</button> ",
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

    public function index()
    {

        $index_eligibility = Eligibility::leftJoin('board', 'eligibility.board_id', 'board.id')

            ->leftJoin('stream', 'eligibility.stream_id', 'stream.id')

            ->leftJoin('course_master', 'eligibility.course_id', 'course_master.id')


            ->select(
                'board.name as board',

                'course_master.name as course',
                'stream.name as stream',

                'eligibility.*'
            )
            ->get();

        return view('backend.eligibility.index', compact('index_eligibility'));
    }
    public function removeItem(Request $request)
    {


        try{
            $item = Eligibility::where('id',$request->id)->first();
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
