<?php

namespace App\Http\Controllers;

use App\Models\UniteTempsTraitement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UniteTempsTraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        //Gerer la pagination
        $uniteTempsTraitements = UniteTempsTraitement::latest()->paginate(5);

        return view('uniteTempsTraitement.index',compact('uniteTempsTraitements'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //creer une unité de temps de traitement
        return view('uniteTempsTraitement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'designationUniteTempsTraitement' => 'required',
        ]);
        
        UniteTempsTraitement::create($request->all());
         
        return redirect()->route('uniteTempsTraitements.index')
                        ->with('success','Unité de temps enregistré avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UniteTempsTraitement  $uniteTempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function show(UniteTempsTraitement $uniteTempsTraitement):View
    {
        //
        return view('uniteTempsTraitement.show',compact('uniteTempsTraitement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UniteTempsTraitement  $uniteTempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function edit(UniteTempsTraitement $uniteTempsTraitement):View
    {
        //
        return view('uniteTempsTraitement.edit',compact('uniteTempsTraitement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UniteTempsTraitement  $uniteTempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniteTempsTraitement $uniteTempsTraitement)
    {
        //
        $request->validate([
            'designationUniteTempsTraitement' => 'required',
        ]);
        
        $uniteTempsTraitement->update($request->all());
        
        return redirect()->route('uniteTempsTraitements.index')
                        ->with('success','Unité de temps de Traitements mis à jour avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UniteTempsTraitement  $uniteTempsTraitement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniteTempsTraitement $uniteTempsTraitement)
    {
        //
        $uniteTempsTraitement->delete();
         
        return redirect()->route('uniteTempsTraitements.index')
                        ->with('success','Unité de Temps de traitement supprimé avec succès');
    }
}
