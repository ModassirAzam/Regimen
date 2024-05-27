<?php
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\job;

// use App\http\controllers\demoApi;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact',function(){
    return view('contact');
});

// Route::resource('jobs',JobController::class)->middleware('auth'); // only this route can work alone, don't need to include all other route because of resource keyword.



Route::get('/jobs',[JobController::class,'index']);

Route::get('/jobs/create',[JobController::class,'create']);

Route::get('/jobs/{job}',[JobController::class,'show']);

Route::post('/jobs',[JobController::class,'store'])->middleware('auth');

Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware('auth')->can('edit','job');// can user policy or gate that is commented in appServiceProvider

Route::patch('/jobs/{job}',[JobController::class,'update']);

Route::delete('/jobs/{job}',[JobController::class,'destroy']);




Route::get('/register',[RegisteredUserController::class,'create']);

Route::post('/register',[RegisteredUserController::class,'store']);



Route::get('/login',[SessionController::class,'create'])->name('login');

Route::post('/login',[SessionController::class,'store']);

Route::post('/logout',[SessionController::class,'destroy']);




// Route::get("/data",[demoApi::class,'getData']);