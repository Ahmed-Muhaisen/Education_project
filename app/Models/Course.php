<?php

namespace App\Models;

use App\Models\base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends base
{

    public function getARExternalContentAttribute()
    {
       $name= $this->external_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new['ar'];
    }
    public function getEnExternalContentAttribute()
    {
       $name= $this->external_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new['en'];
    }



    public function getARInternalContentAttribute()
    {
       $name= $this->internal_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new['ar'];
    }
    public function getEnInternalContentAttribute()
    {
       $name= $this->internal_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new['en'];
    }



    public function getLExternalContentAttribute()
    {
       $name= $this->external_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new[app()->CurrentLocale()];
    }



    public function getLInternalContentAttribute()
    {
       $name= $this->internal_content;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new[app()->CurrentLocale()];
    }


    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function Video()
    {
        return $this->hasMany(Video::class,'course_id');
    }
}
