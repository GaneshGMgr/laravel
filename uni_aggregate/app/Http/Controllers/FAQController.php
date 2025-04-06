<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    public function index()
    {
        $faq = DB::table('faq')->get();
        return view('backend.faq.index', compact(['faq']));
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
        $totalRecords = FAQ::select('count(*) as allcount')->count();
        $query = FAQ::orderBy($columnName, $columnSortOrder)
            ->where('faq.question', 'like', '%' . $searchValue . '%')

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
            $id = $record->id;



            $data_arr[] = array(
                "id" => $i,
                "question" => $record->question,
                "answer" => $record->answer,

                'action' => "<a href='" . route('faq.edit',$record->id) . "'
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
        return view('backend.faq.add');
    }

    public function add_save(Request $request): JsonResponse
    {


        // dd($request->all());
        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];


        try {


            $validate =  Validator::make($request->all(), [
                "question" => ['required', 'min:2', 'max:255'],
                "answer" => ['required', 'min:6'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }


            DB::table('faq')->insert([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);

            $response['response'] = True;
            $response['msg'] = "Form saved Successfully";
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function edit($id)
    {

        $edit_faq = DB::table('faq')
            ->where('id', $id)->first();

        return view('backend.faq.edit', compact('edit_faq'));
    }

    public function save_edit(Request $request,$id)
    {
        $response = [
            'response' => False,
            'msg' => 'Something went wrong',
            'result' => [],
        ];
        // dd($request->id);

        try {
            $validate = Validator::make($request->all(), [
                "question" => ['required', 'min:2', 'max:255'],
                "answer" => ['required', 'min:6'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception('Form validation error');
            }

           FAQ::where('id',$id)
                ->update([
                    'question' => $request->question,
                    'answer' => $request->answer,


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
            'response' => false,
            'msg' => 'something went Wrong',
            'result' => []
        ];


        try {
            $encodedId = $request->query('id');
            $Id = base64_decode(urldecode($encodedId));
            // dd($Id);
            $item = FAQ::where('id', $Id)->first();
            // $item = FAQ::where('id', $request->id)->first();
            if (!$item) {
                $response['response'] = false;
                $response['msg'] = 'item not found';
            } else {
                $item->delete();
                $response['response'] = true;
                $response['msg'] = 'item removed successfully ';
            }
        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }
}
