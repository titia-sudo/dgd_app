<?php

namespace App\Http\Controllers;

use App\Models\TypeDossier;
use Illuminate\Http\Request;

class TypeDossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gerer la pagination
        $typeDossiers = TypeDossier::latest()->paginate(5);

        return view('typeDossier.index',compact('typeDossiers'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('typeDossier.create');
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
            'designationTypeDossier' => 'required',
            'nombreNiveauTraitement' => 'required',
        ]);
        
        TypeDossier::create($request->all());
         
        return redirect()->route('typeDossiers.index')
                        ->with('success','Le type de dossier a été enregistré avec succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeDossier  $typeDossier
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDossier $typeDossier)
    {
        //
        return view('typeDossier.show',compact('typeDossier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeDossier  $typeDossier
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDossier $typeDossier)
    {
        //
        return view('typeDossier.edit',compact('typeDossier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDossier  $typeDossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDossier $typeDossier)
    {
        //
        $request->validate([
            'designationTypeDossier' => 'required',
            'nombreNiveauTraitement' => 'required',
        ]);
        
        $typeDossier->update($request->all());
        
        return redirect()->route('typeDossiers.index')
                        ->with('success','Le Type de dossier a été mis à jour avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDossier  $typeDossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDossier $typeDossier)
    {
        //
        $typeDossier->delete();    
        return redirect()->route('typeDossiers.index')
                        ->with('success','Type de dossier supprimé avec succès');
    }
}
