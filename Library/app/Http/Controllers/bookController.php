<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\GenderModel;
use App\Models\Book;

class bookcontroller extends Controller
{
    //
     public function index()
    {
        $kitab= Book::all();
        // $books = DB::table('books')->get();
        return view ('book.index',compact('kitab'));
    }

    public function addBook()
    {

        return view ('book.addBook');
    }

    public function formdata(Request $req)
    {

        $req->validate([
             'name'=>'required',
            'author'=>'required',
             'publisher'=>'required',
            'distributor'=>'required',
            'Isbn_number'=>'required',
            'image'=>'required',

        ]);
        // Book::create([

            // 'name'=>$req ->name,
            // 'author'=>$req -> author,
            // 'publisher'=>$req -> publisher,
            // 'distributor'=>$req -> distributor,
            // 'Isbn_number'=>$req -> Isbn_number,



            // ]);
            $book= new Book();

            $book->name =$req->input('name');
            $book->author =$req->input('author');
            $book->publisher =$req->input('publisher');
            $book->distributor =$req->input('distributor');
            $book->Isbn_number=$req->input('Isbn_number');

            if($req->hasFile('image')){
                $file=$req->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time(). '.' . $extension;
                $file->move('uploads/book',$filename);
                $book->image=$filename;

            }else{
                return $req;
                $book -> image = '';
            }
            $book->save();
            //  $filename= time()."book.".$req->file('image')->getClientOriginalExtension();
            //  $req->file('image')->storeAs('public/uploads',$filename);



            return view('/book.addBook')->with('book',$book);


    }


}

