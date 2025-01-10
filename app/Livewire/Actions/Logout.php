<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke()
    {
    //     Auth::guard('web')->logout();
        
    // // Redirect to the home page
    //     redirect()->route('home');
    //     Session::invalidate();
    //     Session::regenerateToken();

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->to('/'); // Redirect to home page

    }
}
