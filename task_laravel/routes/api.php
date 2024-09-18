<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Mail;


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
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::group(['prefix'=>'posts'], function(){
        Route::apiResource('post', PostController::class);
    });
    Route::group(['prefix'=>'comments'], function(){
        Route::apiResource('comment', CommentController::class);
    });
});

Route::get('/send', [MailController::class,'send']);



Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
