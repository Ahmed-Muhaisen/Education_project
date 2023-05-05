<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('Category.index',function($user){
       return $user->user_par("Category.index");
       });

       Gate::define('Category.show',function($user){
        $user->user_par('Category.show');
    });

    Gate::define('Category.create',function($user){
        $user->user_par('Category.create');
    });
    Gate::define('Category.update',function($user){
        $user->user_par('Category.update');
    });

    Gate::define('Category.delete',function($user){
        $user->user_par('Category.delete');
    });

    Gate::define('Course.index',function($user){
        return $user->user_par("Course.index");
        });

        Gate::define('Course.show',function($user){
         $user->user_par('Course.show');
     });

     Gate::define('Course.create',function($user){
         $user->user_par('Course.create');
     });
     Gate::define('Course.update',function($user){
         $user->user_par('Course.update');
     });

     Gate::define('Course.delete',function($user){
         $user->user_par('Course.delete');
     });

     Gate::define('Video.index',function($user){
        return $user->user_par("Video.index");
        });

        Gate::define('Video.show',function($user){
         $user->user_par('Video.show');
     });

     Gate::define('Video.create',function($user){
         $user->user_par('Video.create');
     });
     Gate::define('Video.update',function($user){
         $user->user_par('Video.update');
     });

     Gate::define('Video.delete',function($user){
         $user->user_par('Video.delete');
     });
    }
}
