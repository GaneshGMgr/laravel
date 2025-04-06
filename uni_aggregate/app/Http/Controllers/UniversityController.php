<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;


class UniversityController extends Controller
{

    public function index()
    {

        $uni = DB::table('universities')
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->select(
                'country.name as country',
                'universities.name',
                'universities.email',
                'universities.featured_image as featured_image',
                'universities.slug',
                'state.name as state'

            )
            ->get();


        return view('backend.universities.index', compact('uni'));
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
        $totalRecords = DB::table('universities')->select('count(*) as allcount')->count();
        $query = DB::table('universities')->orderBy($columnName, $columnSortOrder)
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')

            ->where('universities.name', 'like', '%' . $searchValue . '%')
            ->orWhere('country.name', 'like', '%' . $searchValue . '%')
            ->orWhere('universities.email', 'like', '%' . $searchValue . '%')
            ->orWhere('state.name', 'like', '%' . $searchValue . '%')
            ->select('universities.*', 'state.name as state_name')
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
            $email = $record->email;
            $country_name = getCountryName($record->country_id);
            $state = $record->state_name;
            $featured_image = asset($record->featured_image);

            $data_arr[] = array(
                "id" => $i,
                "name" => $name,
                "email" => $email,
                "country_id" => $country_name,
                "state_id" => $state,
                "featured_image" => "<img class='image avatar-xs rounded-circle' src='$featured_image'>",
                'action' => "<a href='" . route('uni.edit', $record->slug) . "'
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


    public function add_uni()
    {

        return view('backend.universities.add_uni');
    }

    public function add_uni_save(Request $request): JsonResponse
    {

        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {
            // dd($request->all());

            $validate =  Validator::make($request->all(), [
                "name" => ['required', 'min:6', 'max:255'],
                "email" => ['required'],
                "state" => ['required'],
                "description" => ['required', 'min:6'],
                "featured_image" => ['nullable'],
                "country" => ['nullable'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }


            $featured_image = "";
            if ($request->File('featured_image')) {
                $file = $request->File('featured_image');
                $extension = $file->getClientOriginalName();
                $filename = time() . '.' . $extension;
                $featured_image = 'uploads/universities/' . $filename;
                $file->move('uploads/universities/', $filename);
            }




            DB::table('universities')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'country_id' => $request->country,
                'state_id' => $request->state,
                'description' => $request->description,
                'featured_image' =>  $featured_image,
                'slug' => Str::slug($request->name),
            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('uni_list');
        }
        catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($slug)
    {
        $edit_uni = DB::table('universities')
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->where('universities.slug', $slug)
            ->select(
                'country.name as country',
                'universities.name',
                'universities.email',
                'universities.country_id',
                'universities.state_id',

                'universities.featured_image',

                'universities.country_id',
                'universities.description',
                'state.name as state'
            )
            ->first();

        return view('backend.universities.edit', compact('edit_uni'));
    }

    public function edit_save(Request $request,$slug): JsonResponse
    {
        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {
            // dd($request->all());

            $validate =  Validator::make($request->all(), [
                "name" => ['required', 'min:6', 'max:255'],
                "email" => ['required'],
                "state" => ['required'],
                "description" => ['required', 'min:6'],
                "featured_image" => ['nullable'],
                "country" => ['nullable'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }


            $university = DB::table('universities')->where('slug', $slug)->first();

            $featured_image = $university->featured_image;


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




            DB::table('universities')
                ->where('slug', $slug)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country_id' => $request->country,
                    'state_id' => $request->state,
                    'description' => $request->description,
                    'featured_image' =>  $featured_image,
                    'slug' => Str::slug($request->name),
                ]);

            $response['status'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('uni_list');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function fetchStates(Request $request)
    {
        $output = [
            'response' => false,
            'result' => [],
            'msg' => 'Something went wrong'
        ];

        try {
            $countryId = $request->input('country_id');

            // Query the states based on the selected country ID
            $states = DB::table('state')->where('country_id', $countryId)->get();

            // Prepare the response data
            $output['response'] = true;
            $output['result'] = $states;
            $output['msg'] = '';
        } catch (Exception $e) {
            $output['msg'] = $e->getMessage();
        }

        return response()->json($output);
    }
    public function removeItem(Request $request): JsonResponse
    {
        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];

        try {
            $item = University::where('slug', $request->slug)->first();
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
