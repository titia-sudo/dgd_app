<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TempsTraitement;
use App\Models\NiveauTraitement;
use Illuminate\Support\Facades\DB;
use App\Models\UniteTempsTraitement;
use App\Models\TypeDossier;
use App\Models\NiveauTraitement_TypeDossier;
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
        $users = User::all();
        $niveauTraitements = NiveauTraitement::all();
        $tempsTraitements = TempsTraitement::orderBy('nombreTempsTraitement')->get();
        //$uniteTempsTraitements = UniteTempsTraitement::orderBy('designationUniteTempsTraitement')->get();
        return view('niveauTraitement.create', array('niveauTraitements'=>$niveauTraitements,
                                                     'tempsTraitements'=>$tempsTraitements,
                                                     'users'=>$users
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
            'users' => 'required|array',
        ]);
        $roleId = auth()->user()->role_id;
        //dd($roleId);
        // Créez d'abord le niveau de traitement
        $niveauTraitement = NiveauTraitement::create([
            'nomNiveau' => $request->input('nomNiveau'),
            'idTempsTraitement' => $request->input('idTempsTraitement'),
        ]);
    
        // Assurez-vous que le niveau de traitement a été créé avec succès
        if ($niveauTraitement) {
            // Attachez les utilisateurs sélectionnés au niveau de traitement
            //$niveauTraitement->users()->attach($request->input('users'));
            foreach($request->input('users') as $user){
                DB::table('users_niveautraitements')->insert([
                    'idNiveauTraitement'=>$niveauTraitement->id,
                    'idUser'=>$user,
                    'role_id'=>$roleId
                ]);
                
            }
    
            return redirect()->route('niveauTraitements.index')
                            ->with('success', 'Niveau de traitement enregistré avec succès.');
        } else {
            // Gérez l'erreur si la création du niveau de traitement a échoué
            return redirect()->route('niveauTraitements.create')
                            ->with('error', 'Une erreur s\'est produite lors de la création du niveau de traitement.');
        }
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
        $users = User::all();
        $tempsTraitements = TempsTraitement::orderBy('nombreTempsTraitement')->get();
        return view('niveauTraitement.edit', compact('niveauTraitement', 'tempsTraitements', 'users'));

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
            'users' => 'required|array',
        ]);

        $niveauTraitement->update([
            'nomNiveau' => $data['nomNiveau'],
            'idTempsTraitement' => $data['idTempsTraitement'],
        ]);
        //$niveauTraitement->users()->sync($data['users']);
        //$niveauTraitement->users()->updateExistingPivot($data);
        foreach($request->input('users') as $user){
            DB::table('users_niveautraitements')->update([
                'idNiveauTraitement'=>$niveauTraitement->id,
                'idUser'=>$user,
            ]);
            
        }

        return redirect()->route('niveauTraitements.index')
        ->with('success','niveauTraitement a été mis à jour avec succès');
    }



    public function afficherType(Request $request, NiveauTraitement $niveauTraitement ):View
    {
        $TypeDoss = TypeDossier::all();
        //dd($niveauTraitement);
        return view('niveauTraitement.associer', compact('TypeDoss', 'niveauTraitement'));
    }

    
    public function associerType(Request $request)
    {
        //Validez les données reçues depuis la requête.
        $request->validate([
            'idNiveauTraitement' => 'required|exists:niveauTraitements,id',
            'idTypeDossier' => 'required|exists:typeDossiers,id',
        ]);
        // dd($request->idNiveauTraitement);
        // Trouver le prochain ordre disponible pour ce type de dossier et ce niveau de traitement
        $ordreNiveau = NiveauTraitement_TypeDossier::where('idTypeDossier', $request->idTypeDossier)
        ->max('ordreNiveau') + 1;
        
        // Assurez-vous que l'ordre est au moins 1
        $ordreNiveau = max(1, $ordreNiveau);

        // Enregistrez l'association avec l'ordre dans la table pivot.
        NiveauTraitement_TypeDossier::create([
            'idNiveauTraitement' => $request->idNiveauTraitement,
            'idTypeDossier' => $request->idTypeDossier,
            'ordreNiveau' => $ordreNiveau,
        ]);

        //Réponse réussie.
        return redirect()->route('niveauTraitements.index')
        ->with('success','Ce niveauTraitement a été associé avec succès');
       

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
