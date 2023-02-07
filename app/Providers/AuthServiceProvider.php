<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
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

        // Gate Admin
        Gate::define('admin', function(User $user){
            return $user->level_akun === 5;
        });

        // Gate Sisanya
        Gate::define('staff', function(User $user){
            return $user->level_akun === 1;
        });
        Gate::define('supervisor', function(User $user){
            return $user->level_akun === 2;
        });
        Gate::define('manager', function(User $user){
            return $user->level_akun === 3;
        });
        Gate::define('gm', function(User $user){
            return $user->level_akun === 4;
        });
    }
}
