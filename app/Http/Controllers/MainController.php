<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/**
 * MacroController which will be decomposed once domain boundaries are understood
 */
class MainController
{
    /**
     * Views
     */
    public function showDashboard()
    {
        /**
         *  Grab the account and profile information to place into the emplate
         */
        $user = Auth::user()->load('profiles');

        return view('account-dashboard', [
            'user' => $user,
        ]);
    }

    /**
     * Handlers
     */


}
