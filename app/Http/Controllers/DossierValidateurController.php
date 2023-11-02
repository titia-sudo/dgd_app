<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Annee;
use App\Models\Dossier;
use Illuminate\View\View;
use App\Models\Historique;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use App\Models\NiveauTraitement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use App\Models\NiveauTraitement_TypeDossier;
use App\Notifications\DossierValideNotification;

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

        // Récupérer les dossiers dans le niveau de traitement de l'utilisateur connecté
        $userNiveauTraitement = Auth::user()->niveauTraitements()->first();

        if ($userNiveauTraitement) {
            //dd($userNiveauTraitement, $query->with('typeDossier.niveauTraitement')->get());
            $query->select('dossiers.id', 'dossiers.nomDossier')
                ->join('historique', 'historique.idDossier', '=', 'dossiers.id')
                ->join('users', 'users.id', '=', 'historique.idUser')
                ->where('historique.idUser','!=', Auth::user()->id)
                ->join('typeDossiers', 'typeDossiers.id', '=', 'dossiers.idTypeDossier')
                ->join('niveautraitement_typedossier', 'niveautraitement_typedossier.idTypeDossier', '=', 'typeDossiers.id')
                ->join('niveauTraitements', 'niveauTraitements.id', '=', 'niveautraitement_typedossier.idNiveauTraitement')
                ->where('niveauTraitements.id', '=', $userNiveauTraitement->id)
                ->groupBy('dossiers.id');
            //dd(Auth::user()->id,$query->get());
            // $query->whereHas('niveauTraitement', function ($query) use ($userNiveauTraitement) {
            //     $query->where('id', $userNiveauTraitement->id);
            // });
            }
    // Exclure les dossiers validés
    $query->where('dossiers.statutDossier', '!=', 'valide');

        // Paginer les résultats
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
        // Récupérez le plus petit idNiveauTraitement associé à ce type de dossier
        $idTypeDossier = $request->input('idTypeDossier');
        $typeDossier = TypeDossier::find($idTypeDossier);
        //dd($typeDossier);

        // Vérifiez si le type de dossier existe
        if ($typeDossier) {
            // Récupérez le niveau de traitement associé au type de dossier
            $niveauTraitement = $typeDossier->niveauTraitement()
                ->orderBy('ordreNiveau', 'asc')
                ->first();

        // Vérifiez si le niveau de traitement existe
        if ($niveauTraitement) {
            // Créez le dossier
            $dossier = Dossier::create($dossier);

                // Enregistrez l'historique après la création du dossier
                Historique::create([
                    'actionHistorique' => 'Création de dossier',
                    'statutHistorique' => 'créé',
                    'commentaireAction' => '',
                    'dateAction' => $dossier->created_at,
                    'idDossier' => $dossier->id,
                    'idUser' => auth()->id(),
                    'idNiveauTraitement'=>$niveauTraitement->id
                    // ... (autres champs d'historique que vous souhaitez enregistrer)
                ]);
                return redirect()->route('validateurs.index')->with('success', 'Le dossier '.$dossier->nomDossier.'a été créé avec succès.');
        } else {
            // Le type de dossier n'a pas de niveau de traitement associé
            return redirect()->back()->with('error', 'Ce type de dossier n\'a pas de niveau de traitement associé.');
        }
    } else {
        // Le type de dossier n'existe pas
        return redirect()->back()->with('error', 'Le type de dossier sélectionné n\'existe pas.');
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
        return redirect()->route('validateurs.index')->with('success','le dossier '.$dossier->nomDossier.' a été supprimé avec succès');
    }


    public function traiterDossier(Request $request, Dossier $dossier)
{
    // Vérifiez si le dossier a atteint son dernier niveau de traitement
    if ($dossier->statutDossier === 'valide') {
        return redirect()->route('validateurs.index')->with('error', 'Ce dossier a déjà été validé au dernier niveau de traitement.');
    }

    // Vérifiez si le dossier est associé à un type de dossier
    if ($dossier->typeDossier) {
        // Obtenez le niveau de traitement actuel à partir de la table Historique
        // Récupération de l'ordre du niveau de traitement actuel depuis la table pivot
        $ordreNiveauActuel = $dossier->typeDossier->niveauTraitement()
            ->where('idNiveauTraitement', $dossier->historique->sortByDesc('dateAction')->first()->niveauTraitement->id)
            ->first()->pivot->ordreNiveau;

        // Récupération du niveau de traitement suivant depuis la table pivot
        $niveauTraitementSuivant = $dossier->typeDossier->niveauTraitement()
            ->where('ordreNiveau', '>', $ordreNiveauActuel)
            ->orderBy('ordreNiveau', 'asc')
            ->first();

        // Vérifiez si le formulaire de validation a été soumis
        if ($request->has('valider')) {
            $statutHistorique = 'valide';
        } elseif ($request->has('rejeter')) {
            $statutHistorique = 'rejete';
        }

        $commentaireAction = $request->input('commentaireAction');

        if ($niveauTraitementSuivant) {
            $dossier->update(['statutDossier' => 'en_cours']);
            // Mettez à jour l'entrée dans la table Historique avec le nouveau niveau de traitement
            Historique::create([
                'actionHistorique' => $dossier->nomDossier,
                'statutHistorique' => $statutHistorique,
                'commentaireAction' => $commentaireAction,
                'dateAction' => now(),
                'idDossier' => $dossier->id,
                'idNiveauTraitement' => $niveauTraitementSuivant->id,
                'idUser' => auth()->user()->id,
            ]);

            // Si le dossier est validé au dernier niveau, mettez à jour le statut final du dossier
            if ($niveauTraitementSuivant->pivot->ordreNiveau == $ordreNiveauActuel) {
                if ($statutHistorique == 'valide') {
                    $dossier->update(['statutDossier' => 'valide']);
                } elseif ($statutHistorique == 'rejete') {
                    $dossier->update(['statutDossier' => 'rejete']);
                }

                return redirect()->route('validateurs.index')->with('success', 'le dossier ' . $dossier->nomDossier . ' a été ' . $statutHistorique . ' avec succès.');
            }

            return redirect()->route('validateurs.index')->with('success', 'le dossier ' . $dossier->nomDossier . ' a été ' . $statutHistorique . ' avec succès.');
        } elseif ($dossier->statutDossier == 'en_cours') {
            Historique::create([
                'actionHistorique' => $dossier->nomDossier,
                'statutHistorique' => $statutHistorique,
                'commentaireAction' => $commentaireAction,
                'dateAction' => now(),
                'idDossier' => $dossier->id,
                'idNiveauTraitement' => Auth::user()->niveauTraitements()->first()->id,
                'idUser' => auth()->user()->id,
            ]);
            if ($statutHistorique == 'valide') {
                $dossier->update(['statutDossier' => 'valide']);
            } elseif ($statutHistorique == 'rejete') {
                $dossier->update(['statutDossier' => 'rejete']);
            }

            return redirect()->route('validateurs.index')->with('success', 'le dossier ' . $dossier->nomDossier . ' a été ' . $statutHistorique . ' avec succès.');
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


