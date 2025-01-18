<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

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

    public function modernization()
    {
        return view('services.modernization');
    }

    public function digitization()
    {
        return view('services.digital-transformation');
    }

    public function studyPacks()
    {
        return view('services.certification-study-packs');
    }

    public function managedservices()
    {
        return view('services.managed-services');
    }

    public function industrysolutions()
    {
        return view('services.industry-solutions');
    }

    public function analytics()
    {
        return view('services.ai-analytics');
    }
    
    public function staffing()
    {
        return view('services.staffing');
    }

    public function training()
    {
        return view('services.training-certifications');
    }

}