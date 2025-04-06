<?php

namespace App\Http\Controllers;


use App\Models\Consultancy;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ConsultancyController extends Controller
{
    public function index(){

        $consultancies=DB::table('authorized_consultancy')
        ->leftJoin('universities','authorized_consultancy.university_id','universities.id')
        ->select('universities.name as uni_name','authorized_consultancy.*')
        ->get();

        return view('backend.consultancy.index',compact(['consultancies']));


    }

    public function datatables(Request $request)
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
        $totalRecords = Consultancy::select('count(*) as allcount')->count();
        $query = Consultancy::orderBy($columnName, $columnSortOrder)
            ->leftJoin('universities','authorized_consultancy.university_id','universities.id')
            ->where('authorized_consultancy.name', 'like', '%' . $searchValue . '%')
            ->orWhere('universities.name', 'like', '%' . $searchValue . '%')
            ->select('authorized_consultancy.*','universities.name as uni_name')
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

            $featured_image = $record->featured_image;
            $email = $record->email;
            $university = $record->uni_name;



            $data_arr[] = array(
                "id" => $i,
                "name" => $name,
                "university_id"=>$university,
                "featured_image"=>"<img class='image avatar-xs rounded-circle' src='$featured_image'>",
                "email"=>$email,


                'action' => "<a href='" . route('consultancy.edit', $record->slug) . "'
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


    public function add (){


        return view('backend.consultancy.add');

    }

    public function save_add(Request $request): JsonResponse
    {

        // dd($request->all());
        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];

        try {

            $validate =  Validator::make($request->all(), [
                "name" => ['required'],
                "email" => ['required'],
                "featured_image" => ['required'],
                "description" => ['required', 'min:6'],
                "university" => ['required'],

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
                $featured_image = 'uploads/authorized_consultancies/' . $filename;
                $file->move('uploads/authorized_consultancies/', $filename);
            }



            $universityIds = json_encode($request->university);

            DB::table('authorized_consultancy')->insert([
                'name' => $request->name,
                'email' => $request->email,

                'description' => $request->description,

                'university_id'=>$universityIds,
                'featured_image'=>$featured_image,
                'slug'=>Str::slug($request->name)


            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
            $response['result'] = route('consultancy.index');
$response['result'] = route('');
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);

    }

    public function edit ($slug){

        $edit_consultancy=DB::table('authorized_consultancy')
        ->where('slug',$slug)
        ->first();

        $university_id=[];

        if($edit_consultancy->university_id){
            $university_id=json_decode($edit_consultancy->university_id);

        }

        // dd($university_id);
        // $selectedUniversityIds = explode(',', $edit_consultancy->university_id);
        return view('backend.consultancy.edit',compact(['edit_consultancy','university_id']));
    }

    public function save_edit(Request $request){

          // dd($request->all());
          $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {


            $validate =  Validator::make($request->all(), [
                "name" => ['required'],
                "email" => ['required'],
                "featured_image" => ['required'],
                "description" => ['required', 'min:6'],
                "university" => ['required'],

            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }


            $consultancy = DB::table('authorized_consultancy')->where('slug', $request->slug)->first();

            $featured_image = $consultancy->featured_image;


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



            $universityIds = json_encode($request->university);


            DB::table('authorized_consultancy')
            ->where('slug',$request->slug)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'university_id'=>$universityIds,
                'featured_image'=>$featured_image,
                'slug'=>Str::slug($request->name)


            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";

            $response['result'] = route('consultancy.index');
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
            $item = Consultancy::where('slug',$request->slug)->first();
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
