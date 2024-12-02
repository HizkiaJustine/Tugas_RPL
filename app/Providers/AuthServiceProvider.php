<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Account;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('access-pasien', function ($user) {
            $account = Account::where('email', $user->email)->first();
            return $account && $account->Role === 'pasien';
        });

        Gate::define('access-administrator', function ($user) {
            $account = Account::where('email', $user->email)->first();
            return $account && $account->Role === 'administrator';
        });

        Gate::define('access-kasir', function ($user) {
            $account = Account::where('email', $user->email)->first();
            return $account && $account->Role === 'kasir';
        });

        // ...existing code...
    }
}