<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='authorized_consultancy';

    protected $guarded=[];

    protected $timestamp=false;
}
