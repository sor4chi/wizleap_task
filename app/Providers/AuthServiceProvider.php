<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        
        Gate::define('exeuctive', function ($user) {
            return ($user->role === 'exeuctive');
        });

        Gate::define('manager', function ($user) {
            return ($user->role === 'manager');
        });

        Gate::define('member', function ($user) {
            return ($user->role === 'member');
        });
    }
}
