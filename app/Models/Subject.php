<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function school_class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_classes_id', 'id');
    }
}
