<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function show()
    {
        return view('pages.dashboard-niveau');
    }

}
