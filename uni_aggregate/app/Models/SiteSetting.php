<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='site_settings';
    protected $guarded=[];
    protected $timestamp=false;
}
