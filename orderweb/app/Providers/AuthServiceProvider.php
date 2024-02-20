<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('ADMINISTRADOR', function (User $user) {
            $role = $user->role_id;
            return $role === 1;
        });

        Gate::define('SUPERVISOR', function (User $user) {
            $role = $user->role_id;
            return $role === 2;
        });

        Gate::define('ADMIN-SUPERVISOR', function (User $user) {
            $role = $user->role_id;
            return $role === 1 || $role === 2;
        });

    }
}
