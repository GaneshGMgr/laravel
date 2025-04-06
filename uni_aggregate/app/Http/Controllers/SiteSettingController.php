<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function index()
    {
        $site_setting = SiteSetting::get();
        return view('backend.site_setting.index', compact('site_setting'));
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
        $totalRecords = SiteSetting::select('count(*) as allcount')->count();
        $query = SiteSetting::orderBy($columnName, $columnSortOrder)
            ->where('site_settings.site_name', 'like', '%' . $searchValue . '%')
            ->orWhere('site_settings.email', 'like', '%' . $searchValue . '%')
            ->orWhere('site_settings.address', 'like', '%' . $searchValue . '%')
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
            $site_logo=asset($record->site_logo);
            $below_slider=asset($record->below_slider);

            $data_arr[] = array(
                "id" => $i,

                "site_name" => $record->site_name,
                "email" => $record->email,
                "address" => $record->address,
                "site_logo" =>  "<img class='image avatar-xs rounded-circle' src='$site_logo'>",
                "below_slider" => "<img class='image avatar-xs rounded-circle' src='$below_slider'>",

                'action' => "<a href='" . route('edit.info', $record->id) . "'
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

    public function add()
    {
        return view('backend.site_setting.add');
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
                'site_name' => ['required', 'min:2', 'max:100'],
                'email' => ['required', 'email'],
                'address' => ['required', 'min:2', 'max:100']

            ]);

            if ($validate->fails()) {

                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }


            $site_logo = "";
            if ($request->hasFile('site_logo')) {
                $site_logo = $this->upload($request->site_logo, 'site_setting');
            }
            $below_slider = "";
            if ($request->hasFile('below_slider')) {
                $below_slider = $this->upload($request->below_slider, 'site_setting');
            }

            SiteSetting::create([

                'site_name' => $request->site_name,
                'email' => $request->email,
                'address' => $request->address,
                'site_logo' => $site_logo,
                'below_slider' => $below_slider,

            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('site_setting');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($id)
    {
        $edit_site_setting = DB::table('site_settings')
            ->where('id', $id)->first();

        return view('backend.site_setting.edit', compact('edit_site_setting'));
    }

    public function update(Request $request): JsonResponse
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];

        try {
            $validate = Validator::make($request->all(), [
                'site_name' => ['required', 'min:2', 'max:100'],
                'email' => ['required', 'email'],
                'address' => ['required', 'min:2', 'max:100']
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

            $site_setting = DB::table('site_settings')->where('id', $request->id)->first();

            $site_logo = $site_setting->site_logo;
            $below_slider = $site_setting->below_slider;


            if ($request->hasFile('site_logo')) {
                if (File::exists($site_logo)) {
                    File::delete($site_logo);
                }
                $site_logo = $this->upload($request->site_logo, 'site_settings');
            }


            if ($request->hasFile('below_slider')) {
                if (File::exists($below_slider)) {
                    File::delete($below_slider);
                }
                $below_slider = $this->upload($request->below_slider, 'site_settings');
            }


            SiteSetting::where('id', $request->id)->update([

                'site_name' => $request->site_name,
                'email' => $request->email,
                'address' => $request->address,
                'below_slider' => $below_slider,
                'site_logo' => $site_logo,

            ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
            $response['result'] = route('site_setting');
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
            $item = SiteSetting::where('id', $request->id)->first();
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
