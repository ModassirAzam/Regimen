<?php
use Illuminate\Support\Facades\Route;
use App\Models\job;

// use App\http\controllers\demoApi;

Route::get('/', function () {
    // $job = job::all();
    // dd($job);
    return view('welcome');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/jobs',function(){
    $jobs = job::with('employer')->get(); 
    return view('jobs',['jobs'=> $jobs]);
});

Route::get('/jobs/{id}',function ($id) {
    $job = job::find($id);
    return view('job',['job' => $job]);
});

// Route::get("/data",[demoApi::class,'getData']);