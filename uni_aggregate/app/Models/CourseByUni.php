<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseByUni extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='courses';
    protected $timestamp=false;
    protected $guarded=[];

}
