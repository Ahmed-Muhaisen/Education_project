<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->plainTextToken ;
});

// Route::get('All_Category/{token?}',[CategoryController::class,'index']);
// Route::apiResource('Category',CategoryController::class);
Route::apiResource('Category',CategoryController::class)->middleware('auth:sanctum');


