<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class StudentAuthController extends Controller
{
    public function user_login()
    {

        return view('frontend.auth.user_login');
    }

    public function check_user(Request $request): JsonResponse
    {

        $response=[
            'response'=>False,
            'msg'=>'Something went wrong',
            'result'=>[]
        ];


        try{

            $validate=Validator::make($request->all(),[

                'email'=>['required'],
                'password'=>['required']
            ]);

            if($validate->fails()){
                $response['result']= $validate->errors()->toArray();
                throw new Exception ("Invalid Credentials");

            }

            $user=User::where('email',$request->email)->first();

            if($user){

                $credentials=[
                    'email'=>$request->email,
                    'password'=>$request->password,
                ];


                if(Auth::attempt($credentials)){
                    $request->session()->regenerate();
                    $response['response']=True;
                    $response['msg']="Logged In successfully";

                    $response['result']=route('frontend.index');
                }
            }


        }
        catch(Exception $e)
        {

            $response['msg']=$e->getMessage();
        }
        return response()->json($response);
    }

    public function register()
    {
        return view('frontend.auth.user_register');


    }

    public function save_register(Request $request):JsonResponse
    {
        $response=[
            'response'=>False,
            'msg'=>'Something went wrong',
            'result'=>[]
        ];


        try{

            $validate=Validator::make($request->all(),[

                'name'=>['required','min:6','max:255'],
                'email'=>['required','email'],
                'password'=>['required','min:6','max:255'],

            ]);

            if($validate->fails()){
                $response['result']= $validate->errors()->toArray();
                throw new Exception ("Invalid Credentials");

            }

            $users=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),



            ]);

            Auth::login($users);
            $response['response']=True;
            $response['msg']='You have been registered successfully';
            $response['result']=route('frontend.signin');
        }
        catch(Exception $e){
            $response['msg']=$e->getMessage();

        }

        return response()->json($response);
    }


    public function logout()
    {

        Auth::logout();
        Session::flush();

        return redirect()->route('frontend.index');
    }
}
