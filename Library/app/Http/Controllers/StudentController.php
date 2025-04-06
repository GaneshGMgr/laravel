<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


use App\Models\GenderModel;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('student_list')->get();

        return view('students.index', compact('students'));
    }

    public function add()
    {

        return view('students.add_student');
    }

    public function saveStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'faculty' => 'required',
            'phone_number' => 'required',
            'featureimg' => 'required',

        ]);

        Student::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'email' => $request->email,
            'faculty' => $request->faculty,
            'phone_number' => $request->phone_number,
            'image' => $request->featureimg,
        ]);

       return redirect()->back()->with('message', 'student added successfully');
    }

    // function index(){
    //     $id = DB::table('student_list')->get();

    //
    // }
}
