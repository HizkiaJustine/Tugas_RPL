<?php

namespace App\Providers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['components.navbar'], function ($view) {
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

            if ($user && $user->Role == 'dokter') {
                $dokter = Dokter::where('AccountID', $user->AccountID)->first();
                if ($dokter) {
                    $appointments = Appointment::where('DokterID', $dokter->DokterID)
                        ->where('Status', 'Ongoing')
                        ->orderBy('TanggalJanjiTemu')
                        ->get();
                }
            }

            $view->with('appointments', $appointments);
        });
    }
}
