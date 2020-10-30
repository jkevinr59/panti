<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Role;

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


        $listRole = Role::all()->pluck('name');
        foreach($listRole as $role){
            Gate::define('menu:'.$role, function ($user) use($role) {
                return $user->hasRole($role);
            });
        }
        Gate::define('menu:guest', function ($user)  {
            return !Auth::check();
        });
    }
}
