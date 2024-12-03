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
        return $account->Role === 'administrator';
    }

    public function viewAppointment(Account $account)
    {
        return in_array($account->Role, ['pasien', 'dokter']);
    }
    public function __construct()
    {
        //
    }
}
