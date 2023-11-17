<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landing.index');
    }

    public function news()
    {
        return view('pages.landing.news');
    }
}
