<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseMasterModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='course_master';

    public $timestamp = false;
    protected $guarded = [];
}
