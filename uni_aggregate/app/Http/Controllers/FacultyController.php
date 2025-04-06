<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FacultyController extends Controller
{

    public function index()
    {
        $faculty = DB::table('faculty')
            ->leftJoin('universities', 'faculty.university_id', 'universities.id')
            ->select('faculty.*', 'universities.name as university')
            ->get();
        return view('backend.faculty.index', compact('faculty'));
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
        $totalRecords = DB::table('faculty')->select('count(*) as allcount')->count();
        $query = Faculty::orderBy($columnName, $columnSortOrder)
            ->leftJoin('universities', 'faculty.university_id', 'universities.id')
            ->select('faculty.*', 'universities.name as university')

            ->where('faculty.name', 'like', '%' . $searchValue . '%')
            ->orWhere('universities.name', 'like', '%' . $searchValue . '%')
            ->select('faculty.*', 'universities.name as university')

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
            $university = $record->university;




            $data_arr[] = array(
                "id" => $i,
                "name" => $name,
                "university_id" => $university,

                'action' => "<a href='" . route('edit.faculty', $record->id) . "'
                class='btn btn-sm btn-success edit-item-btn'>Edit</a>
                <button class='btn btn-sm btn-danger delete-item-btn' onclick=softDeleteItem('$record->id')>Delete</button>",
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

    public function add_faculty()
    {
        return view('backend.faculty.add_faculty');
    }

    public function save_faculty(Request $request): JsonResponse
    {

        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:100'],
                'university' => ['required']
            ]);

            if ($validate->fails()) {

                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            DB::table('faculty')->insert([
                'name' => $request->name,
                'university_id' => $request->university,

            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('faculty');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($id)
    {
        $edit_faculty = DB::table('faculty')
            ->where('id', $id)->first();

        return view('backend.faculty.edit', compact('edit_faculty'));
    }

    public function edit_save(Request $request,$id): JsonResponse
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:100'],
                'university' => ['required']
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            DB::table('faculty')->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'university_id' => $request->university,


                ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
            $response['result'] = route('faculty');
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

            $item = Faculty::findOrFail($request->id);
            if (!$item) {
                $response['response'] = false;
                $response['msg'] = 'item not found';
            } else {
                $item->delete();
                $response['response'] = true;
                $response['msg'] = 'item removed successfully ';
            }
        } catch (Exception $exception) {

            $response['msg'] = $exception->getMessage();
        }




        return Response::json($response);
    }
}
