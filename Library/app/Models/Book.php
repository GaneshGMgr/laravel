<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table ='books';

    protected $fillable=['name','author','publisher','distributor','Isbn_number','image'];
    
}
