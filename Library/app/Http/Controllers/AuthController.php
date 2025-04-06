<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $req)
    {
        // User::create([
        //     'name'=>'admin',
        //     'email'=>'admin@gmail.com',
        //     'password' => Hash::make('NepaL1234%')
        // ]);

        // DB::table('users')->inser([

        // ]);

        return view('auth.login');
    }

    public function save(Request $request)
    {

        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        // dd($user);
        // $user = User::find($request->email);
        // $user = DB::table('users')
        if ($user) {
            // Auth::login($user);
            // return redirect('/dashboard');
            //  Auth::attempt([$request->email,[]]);

            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            // dd($credentials);
    
            if(Auth::attempt($credentials)) {
                return redirect('/dashboard');    
            }else{
               return redirect()->back()->with('error', 'creditials doesnot match');
            }
        } else {
            return redirect()->back()->with('error', 'users dont exist');
        }
    }

    public function Userregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

            $success = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

        if ($success) {
            return response()->json([
                'success' => 'Your email has been saved successfully, Thank You',
            ]);
        } else {
            return response()->json([
                'errors' => ['An error occurred while processing your request. Please try again later.'],
            ], 422);
        }
    }

    public function register(){
        return view('auth.register');
    }
}
