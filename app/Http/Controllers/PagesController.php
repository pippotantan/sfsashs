<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $location = 'home';
        return view('welcome', compact('location'));
    }

    public function about()
    {
        $location = 'about';
        return view('about', compact('location'));
    }

    public function faculty()
    {
        //$location = 'about';
        return view('team', compact('location'));
    }

}
