<?php

namespace Sass\Http\Controllers;

use Sass\Http\Requests;
use Illuminate\Http\Request;
use Sass\Module;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $modules = Module::all();
        return view('layouts.main', compact('modules'));
    }
}
