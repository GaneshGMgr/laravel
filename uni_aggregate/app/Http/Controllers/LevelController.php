<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LevelController extends Controller
{

    public function index()
    {
        $level = DB::table('level')->get();
        return view('backend.level.index', compact('level'));
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
        $totalRecords = Level::select('count(*) as allcount')->count();
        $query = Level::orderBy($columnName, $columnSortOrder)
            ->where('level.name', 'like', '%' . $searchValue . '%')
            ->where('deleted_at', null)
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
            $slug = $record->slug;



            $data_arr[] = array(
                "id" => $i,
                "name" => $name,

                'action' => "<a href='" . route('edit.level', $record->slug) . "'
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

    public function add_level()
    {
        return view('backend.level.add_level');
    }


    public function save_level(Request $request): JsonResponse
    {

        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:100']
            ]);

            if ($validate->fails()) {

                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            DB::table('level')->insert([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('level');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($slug)
    {
        $edit_level = DB::table('level')
            ->where('slug', $slug)->first();

        return view('backend.level.edit', compact('edit_level'));
    }

    public function edit_save(Request $request,$slug): JsonResponse
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:100']
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            DB::table('level')->where('slug',$slug)
                ->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),

                ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
            $response['result'] = route('level');
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

        try{
            $item = Level::where('slug',$request->slug)->first();
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
