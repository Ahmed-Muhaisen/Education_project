<?php

namespace App\Http\Controllers\Admin;


use App\Models\Video;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='Index';
        $Video=Video::latest()->get();
       return view('Admin/Video/index')->with('Video',$Video)->with('page',$page);
    }


    public function trash()
    {
        $page='Trash';
          $Video=Video::onlyTrashed()->latest()->get();
        return view('Admin/Video/index')->with('Video',$Video)->with('page',$page);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page="Create";
        $Video=new Video();
        $Course=Course::Select('name','id')->get();
        return view('admin/Video/form')->with('Video',$Video)->with('page',$page)->with('Course',$Course);
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
        "time"=>'required |String |max:100',
        "path"=>'required|String |max:100',
        "image"=>'required |image|mimes:jpg,jpeg,png',

        "Course"=>'required |exists:Courses,id'
     ]);

     if($request->file('image')){
        $image=$request->file('image');
        $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginaL_Name;
        $request->file('image')->move('uploads',$name_image);
     }

     $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

     Video::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),

            'time'=>$request->time,
             'path'=>$request->path,
            'image'=>$name_image,

            'Course_id'=>$request->Course,

     ]);
     return redirect()->route('admin.Video.index')->with('msg','Video Updated successfully')->with('type','info');

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
        $Video=Video::findorfail($id);
        $Course=Course::Select('name','id')->get();
        return view('admin/Video/form')->with('Video',$Video)->with('page',$page)->with('Course',$Course);
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
        "time"=>'required |String |max:100',
        "path"=>'required|String |max:100',
        "image"=>'nullable |image|mimes:jpg,jpeg,png',

        "Course"=>'required |exists:Courses,id',

     ]);

     if($request->file('image')){
        $image=$request->file('image');
        $name_image=rand().''.date('y-m-d').''.time().''.$image->getClientOriginaL_Name;
        $request->file('image')->move('uploads',$name_image);
        Video::findorfail($id)->update([
            'image'=>$name_image,]);
     }

     $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

     Video::findorfail($id)->update([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),

            'time'=>$request->time,
             'path'=>$request->path,

            'Course_id'=>$request->Course,

     ]);

         return redirect()->route('admin.Video.index')->with('msg','Video Updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::findorfail($id)->delete();
        return redirect()->route('admin.Video.index')->with('msg','Video moved to trash successfully')->with('type','danger');
    }

    public function restore($id)
    {
Video::withTrashed()->findorfail($id)->restore();

return redirect()->route('admin.Video.index')->with('msg','Video restored successfully')->with('type','success');
    }


    public function forcedelete($id)
    {
Video::withTrashed()->findorfail($id)->forceDelete();

return redirect()->route('admin.Video.index')->with('msg','Video deleted successfully')->with('type','danger');
    }
}
