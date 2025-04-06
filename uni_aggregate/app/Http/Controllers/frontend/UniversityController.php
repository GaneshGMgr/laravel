<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\University;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UniversityController extends Controller
{

    public function uni_by_country($slug)
    {

        $universities = DB::table('universities')
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            ->where('country.slug', $slug)
            ->select('universities.*', 'country.name as country_name', 'state.name as state_name')
            ->paginate(5);

        $country = DB::table('country')->where('slug', $slug)
            ->first();


        return view('frontend.uni_by_country', compact([
            'universities',
            'country'
        ]));
    }




    public function search (Request $request)
    {
        $slug = $request->input('slug');

        $query = DB::table('universities')
            ->leftJoin('country', 'universities.country_id', 'country.id')
            ->leftJoin('state', 'universities.state_id', 'state.id')
            // ->where('country.slug', $slug)
            ->select('universities.*', 'country.name as country_name', 'state.name as state_name');

            if ($request->keyword) {
                $query->where('universities.name', 'like', "%" . $request->get('keyword') . "%");
                $query->orWhere('state.name', 'like', "%" . $request->get('keyword') . "%");
            }

        $country = DB::table('country')->where('slug', $slug)
            ->first();

            $universities=$query->paginate(5);

        $universitiesHtml = view('frontend.uniResult', compact('universities', 'country'))->render();
        $paginationHtml = $universities->links()->toHtml();

        return response()->json([
            'response' => true,
            'result' => $universitiesHtml,
            'pagination' => $paginationHtml,
        ]);
    }
}
