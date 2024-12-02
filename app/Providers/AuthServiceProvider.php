<?php

namespace App\Providers;

use App\Models\Account;
use App\Policies\AccountPolicy;
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
        Account::class => AccountPolicy::class,
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