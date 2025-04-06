<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::get();
        return view('backend.about.index', compact(['about']));
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
        $totalRecords = AboutUs::select('count(*) as allcount')->count();
        $query = AboutUs::orderBy($columnName, $columnSortOrder)
            ->where('about_us.title', 'like', '%' . $searchValue . '%')

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
            $featured_image = asset($record->featured_image);
            $data_arr[] = array(
                "id" => $i,
                "title" => $record->title,
                "description" => $record->description,
                "featured_image" => "<img class='image avatar-xs rounded-circle' src='$featured_image'>",

                'action' => "<a href='" . route('edit.aboutUs', $record->slug) . "'
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
        return view('backend.about.add');
    }

    public function store(Request $request): JsonResponse
    {


        // dd($request->all());
        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {


            $validate =  Validator::make($request->all(), [
                "title" => ['required', 'min:2', 'max:255'],
                "description" => ['required', 'min:6'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }


            DB::table('about_us')->insert([
                'title' => $request->title,
                'description' => $request->description,

            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit()
    {
        $edit_about_us = DB::table('about_us')->first();

        return view('backend.about.edit', compact('edit_about_us'));
    }

    public function update(Request $request): JsonResponse
    {
        // dd($request->all());
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {
            $validate = Validator::make($request->all(), [
                'title' => ['required', 'min:2', 'max:100'],
                'description' => ['required', 'min:2']
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            $info = DB::table('about_us')->first();

            $featured_image = $info->featured_image;
            if ($request->hasFile('featured_image')) {
                if (File::exists($featured_image)) {
                    File::delete($featured_image);
                }
                $featured_image = $this->upload($request->featured_image, 'about_us');
            }

            DB::table('about_us')->update([
                'title' => $request->title,
                'description' => $request->description,
                'featured_image' => $featured_image,


            ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
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
            $item = AboutUs::where('slug', $request->slug)->first();
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
