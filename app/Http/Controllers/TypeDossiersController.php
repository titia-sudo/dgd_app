<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeDossiersController extends Controller
{
    public function show()
    {
        return view('pages.dashboard-type-dossiers');
    }

}
