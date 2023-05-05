<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::prefix(LaravelLocalization::setLocale())->group(function(){


// });

//ِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِِ
Route::get('test',[WebsiteController::class ,'Api'])->name('Api');
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::get('/',[WebsiteController::class ,'index'])->name('index');
Route::prefix('web')->name('Website.')->group(function(){
    Route::get('Category/{sluge}',[WebsiteController::class ,'Category'])->name('Category');
    Route::get('About',[WebsiteController::class ,'About'])->name('About');
    Route::get('Courses',[WebsiteController::class ,'Courses'])->name('Courses');

    Route::get('My_Courses',[WebsiteController::class ,'My_Courses'])->name('My_Courses');

    Route::get('Course_sengel/{Course:sluge}',[WebsiteController::class ,'Course_sengel'])->name('Course_sengel');
    Route::get('Buy_Course/{Course:sluge}',[WebsiteController::class ,'Buy_Course'])->middleware('auth')->name('Buy_Course');
    Route::get('Buy_course_thanks/{id}',[WebsiteController::class ,'Buy_course_thanks'])->middleware('auth')->name('Buy_course_thanks');

    Route::get('Videos_Course/{Course:sluge}',[WebsiteController::class ,'Videos_Course'])->middleware('auth')->name('Videos_Course');

    Route::get('Video_sengel/{Video:id}',[WebsiteController::class ,'Video_sengel'])->name('Video_sengel');

    Route::get('Video_Show/{Video_id}/{Course_id}/{Complete?}',[WebsiteController::class ,'Video_Show'])->name('Video_Show');

    Route::get('Course_Certificate/{Course:sluge}',[WebsiteController::class ,'Course_Certificate'])->middleware('auth')->name('Course_Certificate');

    Route::get('pdf/{Course:sluge}',[WebsiteController::class ,'pdf'])->name('pdf');
    Route::get('Contact',[WebsiteController::class ,'Contact'])->name('Contact');
    Route::get('Login',[WebsiteController::class ,'Login'])->name('Login');
});





});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->middleware('Admin')->group(function () {

Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('Category/trash',[CategoryController::class,'trash'])->name('Category.trash');
Route::get('Category/restore/{id}',[CategoryController::class,'restore'])->name('Category.restore');
Route::delete('Category/forcedelete/{id}',[CategoryController::class,'forcedelete'])->name('Category.forcedelete');
Route::resource('Category',CategoryController::class);


Route::get('Course/trash',[CourseController::class,'trash'])->name('Course.trash');
Route::get('Course/restore/{id}',[CourseController::class,'restore'])->name('Course.restore');
Route::delete('Course/forcedelete/{id}',[CourseController::class,'forcedelete'])->name('Course.forcedelete');
Route::resource('Course',CourseController::class);


Route::get('Video/trash',[VideoController::class,'trash'])->name('Video.trash');
Route::get('Video/restore/{id}',[VideoController::class,'restore'])->name('Video.restore');
Route::delete('Video/forcedelete/{id}',[VideoController::class,'forcedelete'])->name('Video.forcedelete');
Route::resource('Video',VideoController::class);
});


