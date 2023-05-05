<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='Index';
        $Course=Course::latest()->get();
       return view('Admin/Course/index')->with('Course',$Course)->with('page',$page);
    }


    public function trash()
    {
        $page='Trash';
          $Course=Course::onlyTrashed()->latest()->get();
        return view('Admin/Course/index')->with('Course',$Course)->with('page',$page);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page="Create";
        $Course=new Course();
        $Category=Category::Select('name','id')->get();
        return view('admin/Course/form')->with('Course',$Course)->with('page',$page)->with('Category',$Category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $request->validate([
        "Name_en"=>'required |String |max:100',
        "Name_ar"=>'required |String |max:100',
        "price"=>'required |max:5',
        "descount"=>'required|max:3',
        "en_extrnal_content"=>'required |String |max:1000',
        "ar_extrnal_content"=>'required |String |max:1000',
        "en_intrnal_content"=>'required |String |max:1000',
        "ar_intrnal_content"=>'required |String |max:1000',
        "image"=>'required |image|mimes:jpg,jpeg,png',
        "type"=>'required',
        "Category"=>'required |exists:Categories,id',

     ]);

     if($request->file('image')){
        $image=$request->file('image');
        $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginalName();
        $request->file('image')->move('uploads',$name_image);
     }

     $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
     $external_content=['en'=>$request->en_extrnal_content,'ar'=>$request->ar_extrnal_content];
     $internal_content=['en'=>$request->en_intrnal_content,'ar'=>$request->ar_intrnal_content];
     Course::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'sluge'=>Str::slug($request->Name_en),
            'price'=>$request->price,
            'external_content'=>json_encode($external_content,JSON_UNESCAPED_UNICODE),
            'internal_content'=>json_encode($internal_content,JSON_UNESCAPED_UNICODE),
            'descount'=>$request->descount,
            'image'=>$name_image,
            'type'=>$request->type,
            'category_id'=>$request->Category,

     ]);
     return redirect()->route('admin.Course.index')->with('msg','Course Updated successfully')->with('type','info');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "erre";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page="Edit";
        $Course=Course::findorfail($id);
        $Category=Category::Select('name','id')->get();
        return view('admin/Course/form')->with('Course',$Course)->with('page',$page)->with('Category',$Category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     $request->validate([
        "Name_en"=>'required |String |max:100',
        "Name_ar"=>'required |String |max:100',
        "price"=>'required |max:5',
        "descount"=>'required|max:3',
        "en_extrnal_content"=>'required |String |max:1000',
        "ar_extrnal_content"=>'required |String |max:1000',
        "en_intrnal_content"=>'required |String |max:1000',
        "ar_intrnal_content"=>'required |String |max:1000',
        "image"=>'nullable |image|mimes:jpg,jpeg,png',
        "type"=>'required',
        "Category"=>'required |exists:Categories,id',

     ]);

     if($request->file('image')){
        $image=$request->file('image');
        $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginalName();
        $request->file('image')->move('uploads',$name_image);
        Course::findorfail($id)->update([
            'image'=>$name_image,]);
     }

     $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
     $external_content=['en'=>$request->en_extrnal_content,'ar'=>$request->ar_extrnal_content];
     $internal_content=['en'=>$request->en_intrnal_content,'ar'=>$request->ar_intrnal_content];
     Course::findorfail($id)->update([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'sluge'=>Str::slug($request->Name_en),
            'price'=>$request->price,
            'external_content'=>json_encode($external_content,JSON_UNESCAPED_UNICODE),
            'internal_content'=>json_encode($internal_content,JSON_UNESCAPED_UNICODE),
            'descount'=>$request->descount,
            'type'=>$request->type,
            'category_id'=>$request->Category,

     ]);

         return redirect()->route('admin.Course.index')->with('msg','Course Updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findorfail($id)->delete();
        return redirect()->route('admin.Course.index')->with('msg','Course moved to trash successfully')->with('type','danger');
    }

    public function restore($id)
    {
Course::withTrashed()->findorfail($id)->restore();

return redirect()->route('admin.Course.index')->with('msg','Course restored successfully')->with('type','success');
    }


    public function forcedelete($id)
    {
Course::withTrashed()->findorfail($id)->forceDelete();

return redirect()->route('admin.Course.index')->with('msg','Course deleted successfully')->with('type','danger');
    }
}
