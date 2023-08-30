<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NiveauTraitement;
use App\Models\TempsTraitement;
use App\Models\UniteTempsTraitement;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NiveauTraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $niveauTraitements = NiveauTraitement::with('TempsTraitement')->get();
        $niveauTraitements = NiveauTraitement::latest()->paginate(5);
        return view('niveauTraitement.index', compact('niveauTraitements'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        //
        $niveauTraitements = NiveauTraitement::all();
        $tempsTraitements = TempsTraitement::orderBy('nombreTempsTraitement')->get();
        //$uniteTempsTraitements = UniteTempsTraitement::orderBy('designationUniteTempsTraitement')->get();
        return view('niveauTraitement.create', array('niveauTraitements'=>$niveauTraitements,
                                                     'tempsTraitements'=>$tempsTraitements,
                                                     ));
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
            'nomNiveau' => 'required',
            'idTempsTraitement' =>  'required',
         ]);
         //dd($niveauTraitement);
         NiveauTraitement::create($request->all());

         return redirect()->route('niveauTraitements.index')
                        ->with('success','niveau de traitement enregistrée avec succes.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NiveauTraitement  $niveauTraitement
     * @return \Illuminate\Http\Response
     */
    public function show(NiveauTraitement $niveauTraitement)
    {
        //
        $tempsTraitements = TempsTraitement::orderBy('nombreTempsTraitement')->get();
        return view('niveauTraitement.show',compact('niveauTraitement', 'tempsTraitements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NiveauTraitement  $niveauTraitement
     * @return \Illuminate\Http\Response
     */
    public function edit(NiveauTraitement $niveauTraitement)
    {
        //
        $tempsTraitements = TempsTraitement::orderBy('nombreTempsTraitement')->get();
        return view('niveauTraitement.edit', compact('niveauTraitement', 'tempsTraitements'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NiveauTraitement  $niveauTraitement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NiveauTraitement $niveauTraitement)
    {
        //
        $data = $request->validate([
            'nomNiveau' => 'required',
            'idTempsTraitement' =>  'required|integer',
        ]);

        $niveauTraitement->update($data);

        return back()->with('message', 'niveauTraitement mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NiveauTraitement  $niveauTraitement
     * @return \Illuminate\Http\Response
     */
    public function destroy(NiveauTraitement $niveauTraitement)
    {
        //
        $niveauTraitement->delete();

        return back()->with('message', 'niveauTraitement supprimé.');
    }
}
