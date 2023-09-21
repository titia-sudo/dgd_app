<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
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
    public function index(): View
    {
        return view('pages.adminHome');
    }
    public function demandeurHome(): View
    {
        return view('pages.demandeurHome');
    }

    public function validatorHome(): View
    {
        return view('pages.validatorHome');
    }

    public function adminHome(): View
    {
        return view('pages.adminHome');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function superAdminHome(): View
    {
        return view('pages.superAdminHome');
    }
}
