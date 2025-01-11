<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function cloudSolutions()
    {
        return view('services.cloud-solutions');
    }

    public function cybersecurity()
    {
        return view('services.cybersecurity');
    }

    public function grc()
    {
        return view('services.grc');
    }

    public function coaching()
    {
        return view('services.one-on-one-coaching');
    }

    public function webinars()
    {
        return view('services.webinars-workshops');
    }

    public function studyPacks()
    {
        return view('services.certification-study-packs');
    }

    public function ebooks()
    {
        return view('services.ebooks');
    }

    public function subscriptions()
    {
        return view('services.subscription-plans');
    }
    
}