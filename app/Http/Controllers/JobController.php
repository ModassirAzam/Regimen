<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\user;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Access\Gat;
 

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);  // can use simplePaginate to hide page number and just show prev and next button(for performance reasons)
        return view('jobs.index',['jobs'=> $jobs]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        return view('jobs.show',['job'=>$job]);
    }
    public function store(Job $job)
    {
        request()->validate([
            'title'=> ['required','min:3'],
            'salary' =>['required']
        ]);
    
        $job = Job::create([
            'title'=> request('title'), // table me title ki jgh type hai , may be possible cause of error
            'salary'=>request('salary'),
            'employer_id'=> 1
        ]);

        \Illuminate\Support\Facades\Mail::to($job->employer->user)->send(
            new \App\Mail\JobPosted($job)
        );

        return redirect('/jobs');
    }
    public function edit(Job $job)
    {
        
        // \Illuminate\Support\Facades\Gate::define('edit-job',function(User $user, Job $job){
        //     return $job->employer->user->is($user);
        // });

        // if(Auth::guest())
        // {
        //     return redirect('/login');
        // };

        // \Illuminate\Support\Facades\Gate::authorize('edit-job', $job);

        return view('jobs.edit',['job'=>$job]);
    }
    public function update(Job $job)
    {
        request()->validate([
            'title'=> ['required','min:3'],
            'salary' =>['required']
        ]);
        //auth
    
        $job = Job::findOrFail($job);
    
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();
    
        $job->update([
            'title'=>request('title'),
            'salary'=>request('salary'),
        ]);
    
        return redirect('/jobs/'.$job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
