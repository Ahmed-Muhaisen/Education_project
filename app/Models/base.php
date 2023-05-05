<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class base extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function getARNameAttribute()
    {
       $name= $this->name;
       if($name==null){
        return '';
       }
       $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

       return $name_new['ar'];
    }

    public function getENNameAttribute()
    {
        $name= $this->name;
        if($name==null){
         return '';
        }
        $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);

        return $name_new['en'];
     }

    public function getLNameAttribute()
    {
        $name= $this->name;
        if($name==null){
         return '';
        }


        $name_new=json_decode($name,JSON_UNESCAPED_UNICODE);
     $local_name=$name_new[app()->CurrentLocale()];
        return $local_name; }



}
