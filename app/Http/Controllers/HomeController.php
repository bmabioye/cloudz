<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Make sure `home.blade.php` exists
    }

    public function mentorship()
    {
        return view('mentorship'); // Make sure `home.blade.php` exists
    }

    public function fastcert()
    {
        return view('fastcert-library'); // Make sure `home.blade.php` exists
    }
}
