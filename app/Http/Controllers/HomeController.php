<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function kabeng()
    {
        return view('dashboard/kabeng');
    }
    public function kasir()
    {
        return view('dashboard/kasir');
    }
    public function sparepart()
    {
        return view('dashboard/sparepart');
    }
    public function management()
    {
        return view('dashboard/management');
    }
}
