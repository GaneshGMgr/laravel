<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faculty';
    public $timestamp = false;

    protected $guarded = [];

    public function universities()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
}
