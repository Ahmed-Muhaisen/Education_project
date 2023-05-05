<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('Category.index');


        $page='Index';

        $category=Category::latest()->get();
       return view('Admin/Category/index')->with('Category',$category)->with('page',$page);
    }


    public function trash()
    {
        $page='Trash';
          $category=Category::onlyTrashed()->latest()->get();
        return view('Admin/Category/index')->with('Category',$category)->with('page',$page);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page="Create";
        $Category=new Category();
        return view('admin/Category/form')->with('Category',$Category)->with('page',$page);
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
        "Name_en"=>'required',
        "Name_ar"=>'required',
     ]);

     $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

     Category::create([
            'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
            'sluge'=>Str::slug($request->Name_en)

     ]);
     return redirect()->route('admin.Category.index')->with('msg','Category Updated successfully')->with('type','info');

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
        $Category=Category::findorfail($id);
        return view('admin/Category/form')->with('Category',$Category)->with('page',$page);
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
            "Name_en"=>'required',
            "Name_ar"=>'required',
         ]);

         $name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];

         Category::findorfail($id)->update([
                'name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
                'sluge'=>Str::slug($request->Name_en)

         ]);
         return redirect()->route('admin.Category.index')->with('msg','Category Updated successfully')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        return redirect()->route('admin.Category.index')->with('msg','Category moved to trash successfully')->with('type','danger');
    }

    public function restore($id)
    {
Category::withTrashed()->findorfail($id)->restore();

return redirect()->route('admin.Category.index')->with('msg','Category restored successfully')->with('type','success');
    }


    public function forcedelete($id)
    {
Category::withTrashed()->findorfail($id)->forceDelete();

return redirect()->route('admin.Category.index')->with('msg','Category deleted successfully')->with('type','danger');
    }
}
