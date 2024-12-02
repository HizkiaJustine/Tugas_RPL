<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AuthAdmin extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (!Auth::check()) {
            abort(404, 'This action is unauthorized. You are not logged in.');
        }

        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        if ($account && $account->Role === 'administrator') {
            return view('components.auth-admin');
        } else {
            abort(404, 'This action is unauthorized. You are logged in as: ' . ($user ? $user->email : 'Guest'));
        }
    }
}