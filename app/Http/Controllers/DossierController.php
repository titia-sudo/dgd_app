<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Models\User;
use App\Models\TypeDossier;
use App\Models\Annee;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dossiers = Dossier::latest()->paginate(5);
        return view('dossier.index',compact('dossiers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annees = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossier.create', compact('users', 'typeDossiers'));
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
        $dossiers = $request->validate([
        'nomDossier' => 'required',
        'declarantDossier' => 'required',
        'ifuDossier' => 'required',
        'agrementDossier' => 'required',
        'destinataireDossier' => 'required',
        'elementRequeteDossier' => 'required',
        'texteReferenceDossier' => 'required',
        'statutDossier' => '',
        'idUser' => '',
        'idTypeDossier' => 'required',
        'idAnnee' => ''
        ]);
        //dd($dossiers);
        Dossier::create($request->all());
   
        return redirect()->route('dossiers.index')->with('success','dossier created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        //
        $users = User::orderBy('nomUser', 'ASC')->get();
        $typeDossiers = TypeDossiers::orderBy('designationTypeDossier', 'ASC')->get();
        $annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossier.show',compact('dossier', 'users','typeDossiers', 'annee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
        $users = User::orderBy('nomUser', 'ASC')->get();
        $typeDossiers = TypeDossiers::orderBy('designationTypeDossier', 'ASC')->get();
        $annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossier.edit',compact('dossier', 'users','typeDossiers', 'annee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
        $request->validate([
            'nomDossier' => 'required',
            'declarantDossier' => 'required',
            'ifuDossier' => 'required',
            'agrementDossier' => 'required',
            'destinataireDossier' => 'required',
            'elementRequeteDossier' => 'required',
            'texteReferenceDossier' => 'required',
            'statutDossier' => '',
            'idUser' => '',
            'idTypeDossier' => 'required',
            'idAnnee' => ''
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('dossiers.index')->with('success','dossier mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
        $dossier->delete();
        return redirect()->route('dossiers.index')->with('success','dossier supprimé avec succès');
    }
}
