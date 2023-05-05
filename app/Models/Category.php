<?php

namespace App\Models;

use App\Models\base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends base
{

    public function Course()
    {
        return $this->hasMany(Course::class,'category_id');
    }


}
