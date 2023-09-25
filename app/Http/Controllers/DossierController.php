<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Annee;
use App\Models\Dossier;
use App\Models\Historique;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use App\Events\DossierCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $dossiers = Dossier::latest()->paginate(5);
        return view('dossierDemandeur.index',compact('dossiers'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('dossierDemandeur.create', compact('users', 'typeDossiers'));
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
        //$request->idUser = Auth::user()->id;
        $dossier = $request->validate([
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
       // 'idAnnee' => ''
        ]);
        //dd($dossiers);
        Dossier::create($request->all());
       
        return redirect()->route('dossiers.index')->with('success','Dossier a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
         // dd($dossier);
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierDemandeur.show',compact('dossier', 'users','typeDossiers'));
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
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierDemandeur.edit',compact('dossier', 'users','typeDossiers'));
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
  
        // Sauvegardez les données du dossier mises à jour
        $dossier->update($request->all());

        // Créez une entrée d'historique
        Historique::create([
            'idUser' => auth()->id(), // L'utilisateur actuel
            'actionHistorique' => 'Mise à jour du dossier', // Action effectuée (peut être personnalisée)
            'statutHistorique' => $dossier->statutDossier, // Nouveau statut
            'commentaireAction' => $request->input('commentaireAction'), // Commentaire (ajoutez-le si nécessaire)
            'dateAction' => now(), // Date et heure de l'action actuelle
            'idDossier' => $dossier->id, // ID du dossier mis à jour
            // Ajoutez d'autres informations spécifiques ici
        ]);
  
        return redirect()->route('dossiers.index')->with('success','dossier mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
        public function submit(Request $request)
    {
        // Validez les données du formulaire de soumission
        $this->validate($request, [
            // Définissez les règles de validation appropriées ici
            'nomDossier' => 'required',
            'declarantDossier' => 'required',
            'ifuDossier' => 'required',
            'agrementDossier' => 'required',
            'destinataireDossier' => 'required',
            'elementRequeteDossier' => 'required',
            'texteReferenceDossier' => 'required',
            'statutDossier' => '',
           // 'idUser' => '',
            'idTypeDossier' => 'required',
        ]);

        
        // Enregistrez les données du dossier dans la base de données
        $dossier = new Dossier();
        // Remplissez les champs du dossier avec les données du formulaire
        $dossier->nomDossier = $request->input('nomDossier');
        $dossier->declarantDossier = $request->input('declarantDossier');
        $dossier->ifuDossier = $request->input('ifuDossier');
        $dossier->agrementDossier = $request->input('agrementDossier');
        $dossier->destinataireDossier = $request->input('destinataireDossier');
        $dossier->elementRequeteDossier = $request->input('elementRequeteDossier');
        $dossier->texteReferenceDossier = $request->input('texteReferenceDossier');
        $dossier->declarantDossier = $request->input('declarantDossier');
        $dossier->idUser = $request->input('idUser');
        $dossier->idTypeDossier = $request->input('idTypeDossier');

        // Vérifiez la valeur du bouton "action"
        if ($request->input('action') === 'brouillon') 
        {
            $dossier->statutDossier = 'brouillon';
        } elseif ($request->input('action') === 'soumettre') {

                // Définissez le statut du dossier pour indiquer qu'il est soumis
                $dossier->statutDossier = 'soumis';
        }
        // Enregistrez le dossier
        $dossier->save();

        // Redirigez l'utilisateur vers une page de confirmation ou de suivi
        return redirect()->route('dossiers.index')->with('success','dossier mis à jour');
    }
    
    
     public function destroy(Dossier $dossier)
    {
        //
        $dossier->delete();
        return redirect()->route('dossiers.index')->with('success','dossier supprimé avec succès');
    }
}
