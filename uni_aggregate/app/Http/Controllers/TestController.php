<?php

    namespace App\Http\Controllers;

    use App\Models\Test;
    use Exception;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;

    class TestController extends Controller
    {

        public function index()
        {
            return view('backend.tests.index');
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
            $totalRecords = Test::select('count(*) as allcount')->count();
            $query = Test::orderBy($columnName, $columnSortOrder)
                ->where('test.name', 'like', '%' . $searchValue . '%')
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
                    'action' => "<a href='" . route('test.edit', $record->slug) . "'
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
        return view('backend.tests.add');
    }

        public function add_save(Request $request): JsonResponse
        {

            $response = [
                'response' => False,
                "msg" => "Something went wrong!",
                "result" => []
            ];

            try {

          Test::where('slug',$request->slug)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'slug' => Str::slug($request->name),
                ]);

            $response['response'] = True;
            $response['msg'] = 'Form saved Successfully';
            $response['result'] = route('test');
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);
    }

        public function edit($slug)
        {
            $edit_test = DB::table('test')
                ->where('slug', $slug)->first();

            return view('backend.tests.edit', compact('edit_test'));
        }

        public function save_edit(Request $request,$slug)
        {
            $response = [
                'response' => False,
                'msg' => 'Something went wrong',
                'result' => [],
            ];

            try {
                $validate = Validator::make($request->all(), [
                    "name" => ['required', 'min:2', 'max:255'],
                    "description" => ['required', 'min:6'],
                ]);

                if ($validate->fails()) {
                    $response['result'] = $validate->errors()->toArray();
                    throw new Exception('Form validation error');
                }

               Test::where('slug',$slug)
                    ->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'slug' => Str::slug($request->name),

                    ]);

                $response['response'] = True;
                $response['msg'] = 'Form saved Successfully';
                $response['result']=route('test');
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

                $item = Test::where('slug', $request->slug)->first();
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


