<?php

namespace App\Policies;

use App\Models\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    use HandlesAuthorization;

    public function viewProfile(Account $account)
    {
        return $account->Role === 'pasien';
    }

    public function viewRekamMedis(Account $account)
    {
        return $account->Role === 'pasien';
    }

    public function viewAdmin(Account $account)
    {
        return in_array($account->Role, ['administrator', 'dokter', 'kasir']);
    }

    public function viewAppointment(Account $account)
    {
        return in_array($account->Role, ['pasien', 'dokter']);
    }
    public function viewNotification(Account $account)
    {
        return in_array($account->Role, ['pasien', 'dokter']);
    }

    public function viewAdminObat(Account $account)
    {
        return in_array($account->Role, ['kasir', 'dokter', 'administrator']);
    }
    
    public function viewAdminPayment(Account $account)
    {
        return $account->Role === 'kasir';
    }

    public function viewAdminRekamMedis(Account $account)
    {
        return $account->Role === 'dokter';
    }

    public function viewOnlyAdmin(Account $account)
    {
        return $account->Role === 'administrator';
    }
    public function __construct()
    {
        //
    }
}
