<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlueController extends Controller
{
    public function show()
    {
        return view('pages.dashboard-config-flux');
    }

}
