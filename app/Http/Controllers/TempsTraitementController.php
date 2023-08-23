<?php

namespace App\Http\Controllers;

use App\Models\TempsTraitement;
use App\Models\UniteTempsTraitement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TempsTraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $tempsTraitement = TempsTraitement::with('UniteTempsTraitement')->get();
        $tempsTraitement = TempsTraitement::latest()->paginate(5);

        return view('tempsTraitement.index',compact('tempsTraitement'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //creer de temps de traitement
        $tempsTraitements = TempsTraitement::all();
        $uniteTempsTraitements = UniteTempsTraitement::orderBy('designationUniteTempsTraitement', 'ASC')->get();
        return view('tempsTraitement.create', compact('uniteTempsTraitements'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombreTempsTraitement' => 'required',
            'idUniteTempsTraitement' => 'required',
        ]);
        
        TempsTraitement::create($request->all());
         
        return redirect()->route('tempsTraitements.index')
                        ->with('success','Valeur temps de traitement enregistrée avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tempsTraitement  $tempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function show(TempsTraitement $tempsTraitement):View
    {
        //
        $uniteTempsTraitement = $tempsTraitement->uniteTempsTraitement->designationUniteTempsTraitement;
        return view('tempsTraitement.show',compact('tempsTraitement', 'uniteTempsTraitement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tempsTraitement  $tempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function edit(TempsTraitement $tempsTraitement)
    {
        $uniteTempsTraitement = UniteTempsTraitement::orderBy('designationUniteTempsTraitement')->get();
        return view('tempsTraitement.edit',compact('uniteTempsTraitement', 'tempsTraitement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tempsTraitement  $tempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempsTraitement $tempsTraitement)
    {
        //
        $request->validate([
            'nombreTempsTraitement' => 'required',
            'idUniteTempsTraitement' => 'required',
        ]);
        
        $tempsTraitement->update($request->all());
        
        return redirect()->route('tempsTraitements.index')
                        ->with('success','temps de Traitements mis à jour avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tempsTraitement  $tempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempsTraitement $tempsTraitement)
    {
        //
        $tempsTraitement->delete();
         
        return redirect()->route('tempsTraitement.index')
                        ->with('success','Temps de traitement supprimé avec succès');
    }
}
