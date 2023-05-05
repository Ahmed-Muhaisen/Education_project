<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data= [
            ['code'=>'Category.index'  ,'name'=>'Show all Categories'],
            ['code'=>'Category.show'  ,'name'=>'Show single Category'],
            ['code'=>'Category.create'  ,'name'=>'Create New Category'],
            ['code'=>'Category.Update'  ,'name'=>'Update Category'],
            ['code'=>'Category.delete'  ,'name'=>'Delete Category'],


            ['code'=>'Course.index'  ,'name'=>'Show all Courses'],
            ['code'=>'Course.show'  ,'name'=>'Show single Course'],
            ['code'=>'Course.create'  ,'name'=>'Create New Course'],
            ['code'=>'Course.Update'  ,'name'=>'Update Course'],
            ['code'=>'Course.delete'  ,'name'=>'Delete Course'],


            ['code'=>'Video.index'  ,'name'=>'Show all Videos'],
            ['code'=>'Video.show'  ,'name'=>'Show single Video'],
            ['code'=>'Video.create'  ,'name'=>'Create New Video'],
            ['code'=>'Video.Update'  ,'name'=>'Update Video'],
            ['code'=>'Video.delete'  ,'name'=>'Delete Video'],

        ];
permission::insert($data);
    }
}
