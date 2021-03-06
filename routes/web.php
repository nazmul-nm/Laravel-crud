<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home',[HomeController::class,'index']);
Route::get('/',[HomeController::class,'index'])->name('frontend');



Route::get('/get-comments/{id}',[HomeController::class,'getCommentsByPost']);



Route::get('/about-us',[HomeController::class,'about'])->name('about-us');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::get('/add-userinfo',[HomeController::class,'adduserinfo'])->name('adduserinfo');

//insert user details
Route::post('/insert-user-info',[HomeController::class,'insert_user_info'])->name('insert-user-info');
Route::get('/getUser/{id}',[HomeController::class,'getUser'])->name('getUser');



Route::get('/destroy/{id}',[HomeController::class,'destroy']);

Route::resource('/frontend', HomeController::class);