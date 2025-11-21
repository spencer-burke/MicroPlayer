<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Grab the account and profile information to place into the template
        $user = Auth::user()->load('profiles');

        return view('user-dashboard', [
            'user' => $user,
        ]);
    }
}
