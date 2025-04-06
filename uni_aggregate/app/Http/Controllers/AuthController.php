<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends Controller
{

    public function login()
    {
        return view('backend.auth.signin');
    }


    public function save_sign_in(Request $request): JsonResponse
    {
        // dd($request->all());

        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => ""
        ];


        try {

            $validate = Validator::make($request->all(), [
                "email" => ['required','email'],
                "password" => ['required'],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form validation error");
            }


            $user = User::where('email', $request->email)->where('is_admin', '1')->first();

            $remember=$request->input('remember');

                if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)) {
                    $request->session()->regenerate();
                    $response['response'] = true;
                    $response['msg'] = 'Logged In Successfully';
                    $response['result'] = route('dashboard');
                }

                else{
                    throw new Exception("Invalid Credentials");
                }



        }
        catch (Exception $e) {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function logout()
    {

        Auth::logout();

        Session::flush();

        return redirect()->route('login');
    }


    public function edit(){

        $edit_auth=User::where('id',auth()->user()->id)->first();
        return view('backend.auth.profile',compact('edit_auth'));
    }

    public function change_password(Request $request): JsonResponse
    {


        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];
        // dd($request);

        try{
            $user = Auth::user();

            $previousPassword = $request->input('previous_password');

            $validate = Validator::make($request->all(), [
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Error");
            }

            if (Hash::check($previousPassword, $user->password)) {
                User::where('id',auth()->user()->id)
                ->update([
                    'password'=>Hash::make($request->password)
                ]);



        }
        $response['response'] = True;
        $response['msg'] = "Password updated Successfully";

    }
    catch (Exception $e) {

        $response['msg'] = $e->getMessage();
    }
    return response()->json($response);
    }

    public function change_email(Request $request): JsonResponse
    {


        $response = [
            'response' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];
        try{

            $validate = Validator::make($request->all(), [
                'email' => ['required','email'],

            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Error");
            }

            User::where('id',auth()->user()->id)
            ->update([
                'email'=>$request->email
            ]);

            $response['response'] = True;
            $response['msg'] = "Email updated Successfully";
        }
        catch(Exception $e){
            $response['msg'] = $e->getMessage();
        }
        return response()->json($response);

    }
}
