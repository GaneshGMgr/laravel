<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LatestInfo extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='latest_info';
    protected $guarded=[];
    protected $timestamp=false;
}
