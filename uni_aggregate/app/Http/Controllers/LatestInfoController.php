<?php

namespace App\Http\Controllers;

use App\Models\LatestInfo;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LatestInfoController extends Controller
{
    public function index()
    {
        $latest_info = LatestInfo::get();
        return view('backend.latest_info.index', compact('latest_info'));
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
        $totalRecords = LatestInfo::select('count(*) as allcount')->count();
        $query = LatestInfo::orderBy($columnName, $columnSortOrder)
            ->where('latest_info.name', 'like', '%' . $searchValue . '%')
            ->orWhere('latest_info.creator_name', 'like', '%' . $searchValue . '%')
            // ->where('deleted_at', null)
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
                "creator_name" => $record->creator_name,
                "url" => $record->url,
                "featured_image" => asset($record->featured_image),

                'action' => "<a href='" . route('edit.info', $record->slug) . "'
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
        return view('backend.latest_info.add');
    }


    public function store(Request $request): JsonResponse
    {

        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'min:2', 'max:255'],
                'creator_name' => ['required', 'min:2', 'max:255'],
                'url' => ['required']
            ]);

            if ($validate->fails()) {

                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }
            $featured_image = "";
            if ($request->hasFile('featured_image')) {

                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/latest_info/' . $filename;
                $file->storeAs('uploads/latest_info/', $filename);
            }

            LatestInfo::create([
                'name' => $request->name,
                'creator_name' => $request->creator_name,
                'url' => $request->url,
                'featured_image' => $featured_image,
                'slug' => Str::slug($request->name),
            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('info');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($slug)
    {
        $edit_latest_info = DB::table('latest_info')
            ->where('slug', $slug)->first();

        return view('backend.latest_info.edit', compact('edit_latest_info'));
    }

    public function update(Request $request,$slug): JsonResponse
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

            $info = DB::table('latest_info')->where('slug', $request->slug)->first();

            $featured_image = $info->featured_image;

            if ($request->hasFile('featured_image')) {

                if (FIle::exists($featured_image)) {
                    FIle::delete($featured_image);
                }


                $file = $request->file('featured_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/universities/' . $filename;
                $file->storeAs('uploads/universities/', $filename);
            }

            LatestInfo::where('slug', $slug)
                ->update([
                    'name' => $request->name,
                    'creator_name' => $request->creator_name,
                    'url' => $request->url,
                    'featured_image' => $featured_image,
                    'slug' => Str::slug($request->name),

                ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
            $response['result'] = route('info');
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
            $item = LatestInfo::where('slug', $request->slug)->first();
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
