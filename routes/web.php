<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/importPosts',[PostController::class,'importPosts']);
Route::get('/post',[PostController::class,'postForm']);
Route::post('/addPosts',[PostController::class,'addPosts']);
Route::get('/register',[UserController::class,'register']);
Route::post('/createUser',[UserController::class,'createUser']);
Route::get('/login',[LoginController::class,'login']);
Route::post('/loginUser',[LoginController::class,'loginUser']);
Route::get('/logout', function (Illuminate\Http\Request $request) {
    $request->session()->flush();
    return redirect('/login');
});
Route::get('/dashboard',[DashboardController::class,'Dashboard']);
Route::get('/profile',[DashboardController::class,'Profile']);
Route::get('/newProject',[ProjectController::class,'newProject']);
Route::post('/addProject',[ProjectController::class,'addProject']);
Route::get('/editProject/{id}',[ProjectController::class,'editProject']);
Route::post('/updateProject/{id}',[ProjectController::class,'updateProject']);
Route::get('/deleteProject/{id}',[ProjectController::class,'deleteProject']);