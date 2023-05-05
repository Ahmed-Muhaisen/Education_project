<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user=User::find(1);
        // return $user->CreateToken('text')->plainTextToken ;


        // $api=Http::get('https://jsonplaceholder.typicode.com/posts');
        // dd(json_decode($api->body()));
    //         if($request->token){
    //             if(User::where('token',$request->token)->exists()){

                    // return[
                    //     'message'=>'Shaw all Category Successfoly',
                    //     'statas'=>'200',
                    //     'data'=>Category::all()
                    // ];

    //             }


    //             else{

    //                 return[
    //                     'message'=>'token no valid',
    //                     'statas'=>'301',
    //                     'data'=>null
    //                 ];

    //         }


    // }else{
    //     return[
    //         'message'=>'not athorize',
    //         'statas'=>'301',
    //         'data'=>null
    //     ];
    // }

    return response()->json([
        'message'=>'Shaw all Category Successfoly',
        'statas'=>'200',
        'data'=>Category::all()
    ],200);
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
        $data=['name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
        'sluge'=>Str::slug($request->Name_en)];

        return response()->josn([
            'message'=>'add Category Successfoly',
            'statas'=>'201',
            'data'=>Category::create($data)
        ],201);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $Category=Category::find($id);

        if($Category){
        return response()->json([
            'message'=>'add Category Successfoly',
            'statas'=>'200',
            'data'=>$Category
        ],200);
    }
        else{
            return response()->json([
                'message'=>'Error',
                'statas'=>'404',
                'data'=>''
            ], 404);
    }
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
        $data=['name'=>json_encode($name,JSON_UNESCAPED_UNICODE),
        'sluge'=>Str::slug($request->Name_en)];
        $Category=Category::find($id);
        if($Category){
       return response()->json([
            'message'=>'Update Category Success',
            'statas'=>'200',
            'data'=>$Category->update($data)
           ],200);
        }else{
            return response()->json([
                'message'=>'Error',
                'statas'=>'404',
                'data'=>null
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category=Category::find($id);
        if($Category){
        return response()->json([
            'message'=>'Delete Category Success',
            'statas'=>'200',
            'data'=>$Category->delete()
           ],200);
    }else{
        return response()->json([
            'message'=>'Error',
            'statas'=>'404',
            'data'=>null
        ], 404);
    }
}
}
