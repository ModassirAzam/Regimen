<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\job;
use App\Models\user;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::preventLazyLoading();


        
        // \Illuminate\Support\Facades\Gate::define('edit-job',function(User $user, Job $job){
        //     return $job->employer->user->is($user);
        // });
    }
}
