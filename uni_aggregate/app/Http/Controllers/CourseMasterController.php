<?php

namespace App\Http\Controllers;

use App\Models\CourseMasterModel;
use App\Models\Faculty;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseMasterController extends Controller
{

    public function index()
    {
        $course_master = DB::table('course_master')->get();
        return view('backend.course_master.index', compact('course_master'));
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
        $totalRecords = CourseMasterModel::select('count(*) as allcount')->count();
        $query = CourseMasterModel::orderBy($columnName, $columnSortOrder)
            ->leftJoin('country', 'course_master.country_id', 'country.id')
            ->where('course_master.name', 'like', '%' . $searchValue . '%')
            ->orWhere('country.name', 'like', '%' . $searchValue . '%')
            ->select('course_master.*', 'country.name as country')
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

            $name = $record->name;
            $country = $record->country;
            $slug = $record->slug;



            $data_arr[] = array(
                "id" => $i,
                "name" => $name,
                "country_id" => $country,

                'action' => "<a href='" . route('edit.course_master', $record->slug) . "'
                class='btn btn-sm btn-success edit-item-btn'>Edit</a>
                <button class='btn btn-sm btn-danger delete-item-btn' onclick=softDeleteItem('$record->slug')>Delete</button>",
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

    public function add()
    {
        return view('backend.course_master.add');
    }

    public function save_add(Request $request)
    {


        $response = [
            'response' => False,
            'msg' => 'Something went wrong!',
            "result" => []
        ];

        try {





            $validate = Validator::make($request->all(), [
                "name" => ['required', 'min:2', 'unique'],
                "country" => ['required'],
            ]);
            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }

            DB::table('course_master')->insert([
                'name' => $request->name,
                'country_id' => $request->country,
                'slug' => Str::slug($request->name),

                // 'slug' => Str::slug($request->name),
            ]);
            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('index.course_master');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($slug)
    {

        $edit_course_master = DB::table('course_master')->where('slug', $slug)->first();


        return view('backend.course_master.edit', compact('edit_course_master'));
    }

    public function save_edit(Request $request,$slug)
    {


        $response = [
            'response' => False,
            'msg' => 'Something went wrong!',
            "result" => []
        ];

        try {
            $validate = Validator::make($request->all(), [
                "name" => ['required', 'min:2', 'unique'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new \Exception("Form Validaton Error");
            }


            DB::table('course_master')
                ->where('slug', $slug)
                ->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),

                    // 'slug' => Str::slug($request->name),
                ]);
            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('index.course_master');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function removeItem(Request $request)
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];
        try {
            $item = CourseMasterModel::where('slug', $request->slug)->first();
            if (!$item) {
                $response['response'] = false;
                $response['msg'] = 'item not found';
            } else {
                $item->delete();
                $response['response'] = true;
                $response['msg'] = 'item removed successfully ';
            }
        } catch (Exception $expection) {

            $response['msg'] = $expection->getMessage();
        }

        return Response::json($response);
    }
}
