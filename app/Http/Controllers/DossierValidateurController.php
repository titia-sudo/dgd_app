<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\NiveauTraitement_TypeDossier;
use App\Models\Annee;
use App\Models\Dossier;
use Illuminate\View\View;
use App\Models\Historique;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use App\Models\NiveauTraitement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;

class DossierValidateurController extends Controller
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


    public function index(Request $request)
    {
        $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $dateCreation = $request->input('dateCreation', '');
        $ifu = $request->input('ifu', '');
        $declarant=$request->input('declarant', '');
        $statut=$request->input('statut', '');
        
     
         $query = Dossier::query();
        // Appliquez le filtre en fonction de la date de création
        if (!empty($dateCreation)) {
           $query->whereDate('dossiers.created_at', '=', $dateCreation); 
       }
       if (!empty($ifu)) {
            $query->where('dossiers.ifuDossier', '=', $ifu); 
        }
        if (!empty($declarant)) {
            $query->where('dossiers.declarantDossier', '=', $declarant); 
        }
        if (!empty($statut)) {
            $query->where('dossiers.statutDossier', '=', $statut); 
        }

       //Pour récupérer les dossiers créés par l'utilisateur connecté :
       $dossiersCrees = Dossier::where('idUser', auth()->user()->id);

       //Pour récupérer les dossiers en attente de validation dans le niveau de traitement de l'utilisateur :
       $dossiersEnAttente = Historique::where('idNiveauTraitement', auth()->user()->niveau_traitement_id)
           ->where('statutHistorique', 'En attente de validation')->select('idDossier'); // Récupère uniquement les IDs des dossiers

       //Pour fusionner les deux et récupérer les dossiers paginés :
       $dossiers = Dossier::whereIn('id', $dossiersCrees->union($dossiersEnAttente)->pluck('id'))
           ->orderBy('created_at', 'desc')
           ->paginate(5);

        $dossiers = $query->paginate(5);
        return view('dossierValidateur.index',compact('dateCreation','recents', 'ifu','declarant','statut','dossiers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annees = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierValidateur.create', compact('users', 'recents','typeDossiers'));
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
        $dossier= Dossier::create($request->all());

        if ($dossier) {
            // Enregistrez l'historique après la création du dossier
            Historique::create([
                'actionHistorique' => 'Création de dossier',
                'statutHistorique' => 'Nouveau dossier créé : ' . $dossier->nomDossier,
                'commentaireAction' => '',
                'dateAction' => $dossier->created_at,
                'idDossier' => $dossier->id,
                'idUser' => auth()->id(),
                // ... (autres champs d'historique que vous souhaitez enregistrer)
            ]);
            return redirect()->route('validateurs.index')->with('success','le dossier a été créé avec succes.');
        } else {
            // Gérez l'erreur si la création du dossier a échoué
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création du dossier.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierValidateur.show',compact('dossier','recents', 'users','typeDossiers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        
        $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierValidateur.edit',compact('dossier','recents', 'users','typeDossiers'));
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
  
        return redirect()->route('validateurs.index')->with('success','dossier mis à jour');
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
        return redirect()->route('validateurs.index')->with('success','dossier mis à jour');
    }
    
    
     public function destroy(Dossier $dossier)
    {
        //
        $dossier->delete();
        return redirect()->route('validateurs.index')->with('success','dossier supprimé avec succès');
    }

    public function dossiersEnAttente()
    {
        // Récupérez les dossiers en attente de validation pour l'utilisateur actuel
        $dossiersEnAttente = Historique::where('idNiveauTraitement', auth()->user()->niveau_traitement_id)
            ->where('statutHistorique', 'En attente de validation')
            ->get();

        // Retournez la vue avec les dossiers en attente
        return view('dossiers.en-attente', compact('dossiersEnAttente'));
    }

    public function valider(Historique $dossierHistorique)
    {
        // Mettez à jour le statut du dossier dans l'historique
        $dossierHistorique->update(['statutHistorique' => 'Validé']);

        // Redirigez l'utilisateur vers la liste des dossiers en attente
        return redirect()->route('dossiers.en-attente')->with('success', 'Dossier validé avec succès.');
    }

    public function rejeter(Historique $dossierHistorique)
    {
        // Mettez à jour le statut du dossier
        $dossierHistorique->update(['statutHistorique' => 'Rejeté']);
    }


    public function validerDossier(Request $request, Dossier $dossier)
{
    // Vérifiez si le dossier est associé à un type de dossier
    if ($dossier->typeDossier) {
        // Obtenez le niveau de traitement actuel à partir de la table Historique
        $niveauTraitementActuel = $dossier->historique->sortByDesc('dateAction')->first()->niveauTraitement;
        

        // Recherchez le niveau de traitement suivant dans la table NiveauTraitement
        $niveauTraitementSuivant = $dossier->typeDossier->niveauTraitement()
        //dd($niveauTraitementSuivant);
            ->wherePivot('ordreNiveau', '>', $niveauTraitementActuel->niveauTraitement->pivot->ordreNiveau)
            ->where('ordreNiveau', '>', $niveauTraitementActuel->niveauTraitement->pivot->ordreNiveau)
            ->orderBy('ordreNiveau', 'asc')
            ->first();

        if ($niveauTraitementSuivant) {
            // Mettez à jour l'entrée dans la table Historique avec le nouveau niveau de traitement
            Historique::create([
                'actionHistorique' => $dossier->nomDossier,
                'statutHistorique' => 'En attente de validation',
                'commentaireAction' => $request->input('commentaire'), // Utilisez la valeur du champ commentaire du formulaire
                'dateAction' => now(), // Utilisez la date et l'heure actuelles
                'idDossier' => $dossier->id,
                'idNiveauTraitement' => $niveauTraitementSuivant->id,
                'idUser' => auth()->user()->id,
                // ... (autres champs d'historique que vous souhaitez enregistrer)
            ]);

            return redirect()->route('validateurs.index')->with('success', 'Dossier validé avec succès.');
        } else {
            // Le dossier n'a pas de niveau de traitement suivant
            return redirect()->route('validateurs.index')->with('error', 'Ce dossier n\'a pas de niveau de traitement suivant.');
        }
    } else {
        // Le dossier n'est pas associé à un type de dossier
        return redirect()->route('validateurs.index')->with('error', 'Ce dossier n\'est pas associé à un type de dossier.');
    }
}
    
    }


