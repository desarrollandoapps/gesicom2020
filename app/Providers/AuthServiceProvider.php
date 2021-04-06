<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('investigador', function($user) {
            return $user->hasAnyRol(['Administrador', 'Líder SENNOVA', 'Investigador']);
        });

        Gate::define('administrar-usuario', function($user) {
            return $user->hasRol('Administrador');
        });

        Gate::define('presupuesto', function($user) {
            return $user->hasAnyRol(['Administrador', 'Líder SENNOVA']);
            // return $user->hasRol('Líder SENNOVA');
        });
    }
}
