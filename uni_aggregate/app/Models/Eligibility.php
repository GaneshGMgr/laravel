<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eligibility extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='eligibility';
    protected $guarded = [];
    protected $timestamp = false;
}
