<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Category;

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
        return view('fastcert.landing'); // Make sure `home.blade.php` exists
    }
}
