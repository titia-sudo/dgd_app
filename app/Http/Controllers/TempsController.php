<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempsController extends Controller
{
    public function show()
    {
        return view('pages.dashboard-temps');
    }

}
