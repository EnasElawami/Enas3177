<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }
    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function engineers()
    {
        return view('home.engineers');
    }
    public function store()
    {
        return view('home.store');
    }

}

