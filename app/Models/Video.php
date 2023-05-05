<?php

namespace App\Models;

use App\Models\base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends base
{
    public function Course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }


}
