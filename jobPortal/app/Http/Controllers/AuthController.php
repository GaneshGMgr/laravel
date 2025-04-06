<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function user_register(Request $request): JsonResponse
    {
        // dd($request->all());

        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];
        try {
            $validate = Validator::make($request->all(), [
                "email" => ['required', 'email:rfc','unique:users,email'],
                "password" => ['required', 'min:6', "max:255"],
                "user_type" => ['required', Rule::in(['1', '2'])]
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }

            DB::table('users')->insert([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
            ]);
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }

    public function user_login(Request $request): JsonResponse
    {

        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => ""
        ];


        try {
            $validate = Validator::make($request->all(), [
                "email" => ['required', 'email:rfc,dns'],
                "password" => ['required', 'min:6', "max:255"],
            ]);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Invalid Credentials");
            }
            $user = User::where('email', $request->email)->first();

            if ($user) {

                $credentials = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    $response['status'] = True;
                    $response['msg'] = "Login Successfully";


                    if (Auth::user()->user_type == 2) {
                        $response['result']  = route('dashboard');

                    }
                     elseif (Auth::user()->user_type == 1)
                    {
                        $response['result']  = route('dashboard');
                    }
                }
            }
        }
        catch (Exception $e)
         {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);



        // dd(Auth::attempt($credentials));

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
