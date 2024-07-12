<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
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

        Gate::define('editar-users', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('create-content', function ($user) {
            return $user->role === 'admin' || $user->role === 'padrao';
        });

        Gate::define('editar-card', function ($user) {
            return $user->role === 'user';
        });
    }
}
