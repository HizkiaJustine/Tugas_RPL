<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Pasien;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $user = Auth::user();
            $appointments = collect();

            if ($user && $user->Role == 'pasien') {
                $patient = Pasien::where('AccountID', $user->AccountID)->first();
                if ($patient) {
                    $appointments = Appointment::where('PasienID', $patient->PasienID)
                        ->where('Status', 'Ongoing')
                        ->orderBy('TanggalJanjiTemu')
                        ->get();
                }
            }

            $view->with('appointments', $appointments);
        });
    }
}
