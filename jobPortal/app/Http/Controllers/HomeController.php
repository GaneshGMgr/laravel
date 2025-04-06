<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Hash;
 use App\Models\CompanyLocation;

class HomeController extends Controller
{
    public function homeIndex(){
        $aboutus_category = DB::table('aboutus_category')->get();
        $site = DB::table('site_setting')->first();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $country = DB::table('country')->get();
        $jobCategory = DB::table('job_category')->get();
        $testimonial = DB::table('testimonials')->where('is_active',1)->get();
        $about = DB::table('aboutus')->where('category_id','1')->get();
        $data_counters = DB::table('data_counters')->get();

        return view('frontend.index', compact('country','about','jobCategory','serviceCategory','document','testimonial','aboutus_category','data_counters','site'));
    }

    public function menu(){
        $about = DB::table('aboutus')->get();
        $serviceCategory = DB::table('services')->get();
        $document = DB::table('document_subtitle')->get();
        $aboutus_category = DB::table('aboutus_category')->get();
        return view('layouts.header', compact('about,serviceCategory,document','aboutus_category'));
    }

    public function post_job (){
        return view('frontend.dashboard.post_job');
    }
    public function edit_profile (){
        return view('frontend.dashboard.edit_profile');
    }

    public function save_edit_profile(Request $request){
        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];

        try {

            $validate = Validator::make($request->all(), [
                "name" =>['required','min:6','max:255'],
                "phone" =>['required','min:10','max:10'],
                "description" =>['required','min:6'],
                "website" =>['nullable','min:6'],
                "featured_image" =>['required'],
                "logo" => ['required'],


            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }
            if($request->hasFile(',')){
                $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time(). '.' . $extension;
                $file->move('uploads/books/',$filename);


            }else{
               $filename= '';
            }

            $country=DB::table('country')->get();

            DB::table('company_profile')->insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
                'featured_image'=>$request->featured_image ?$filename : "" ,
            ]);

            DB::table('company_location')->insert([
                'company_id'=>$request->auth()->user()->id,
                'country_id'=>$request->country,
                'city' => $request->city,
                'address' => $request->address,
            ]);

            DB::table('company_social_links')->insert([
                'company_id'=>$request->auth()->user()->id,
                'facebook'=>$request->facebook,
                'linkden' => $request->linkden,
                'instagram' => $request->instagram,
            ]);





        } catch (Exception $e) {

            $response['msg'] = $e->getMessage();

        }



    }
}
