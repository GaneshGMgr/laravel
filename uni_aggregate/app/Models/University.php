<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class University extends Model
{
    use HasFactory;


    protected $table ='universities';
    protected $guarded='';

    public function faculty(){
        return $this->hasMany(Faculty::class,'university_id');
    }
}
