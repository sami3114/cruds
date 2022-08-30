<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=['id','name','email','phone','password','school_class_id','gender','birthday','address','photo'];

    public function school_class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id', 'id');
    }
}
