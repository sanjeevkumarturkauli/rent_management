<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardInitialization extends Controller
{
    public function initialization()
    {
        // Get the user's roles
        $roles = Auth::user()->getRoleNames();

        // Check if the user has any roles
        if (isset($roles[0]) && !empty($roles[0])) {
            // Redirect to the dashboard for the first role
            return redirect()->route($roles[0] . '.dashboard');
        }

        // Default view if no roles are found
        return view('dashboard');
    }
}
