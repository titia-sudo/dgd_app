<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{
    public function show()
    {
        return view('pages.dashboard-ls-dossiers');
    }

    public function NewDossier()
    {
        return view('pages.nouveau-dossier');
    }

}


