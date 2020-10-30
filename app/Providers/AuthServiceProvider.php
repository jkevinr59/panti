<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

       
        Gate::define('menu:superadmin', function ($user) {
            return $user->hasRole('superadmin');
        });
        Gate::define('menu:pengurus', function ($user) {
            return $user->hasRole('pengurus');
        });
        Gate::define('menu:donatur', function ($user) {
            return $user->hasRole('donatur');
        });
        Gate::define('menu:guest', function ($user) {
            return !Auth::check();
        });
    }
}
