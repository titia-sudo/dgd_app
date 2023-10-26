<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Auth;
use App\Models\User;
use App\Models\Annee;
use App\Models\Dossier;
use App\Models\Historique;
use App\Models\TypeDossier;
use App\Models\NiveauTraitement_TypeDossier;
use Illuminate\Http\Request;
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
            
        //$dossiersCrees = Dossier::where('idUser', auth()->user()->id)->get();
        $query->where('idUser', auth()->user()->id);
        //dd($dossiersCrees);
        // Fusionnez les deux requêtes
        $dossiersFiltres = $query->paginate(5);

        return view('dossierDemandeur.index',compact('dateCreation','recents', 'ifu','declarant','statut','dossiersFiltres'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annees = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierDemandeur.create', compact('users', 'recents','typeDossiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = $request->input('action'); // Obtenez la valeur de l'action du formulaire

        //$request->idUser = Auth::user()->id;
        $dossierData = $request->validate([
        'nomDossier' => 'required',
        'declarantDossier' => 'required',
        'ifuDossier' => 'required',
        'agrementDossier' => 'required',
        'destinataireDossier' => 'required',
        'elementRequeteDossier' => 'required',
        'texteReferenceDossier' => 'required',
        //'statutDossier' => $statutDossier,
        'idUser' => '',
        'idTypeDossier' => 'required',
        ]);
        //dd($dossiers);
        // Déterminez le statut du dossier en fonction de l'action
        $statutDossier = ($action === 'brouillon') ? 'brouillon' : 'soumis';

        // Ajoutez le statut du dossier aux données à enregistrer
        $dossierData['statutDossier'] = $statutDossier;

        //Création de dossier
        $dossier = Dossier::create($dossierData);
        // Si l'action est "Enregistrer"
        
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
           // $dossier = Dossier::create($dossier);

            if ($action === 'brouillon') {
            
                // Enregistrez l'historique avec le statut 'brouillon'
                Historique::create([
                    'actionHistorique' => $action,
                    'statutHistorique' => 'brouillon',
                    'commentaireAction' => '',
                    'dateAction' => now(),
                    'idDossier' => $dossier->id,
                    'idUser' => auth()->id(),
                    'idNiveauTraitement' => $niveauTraitement->id, // Assurez-vous d'obtenir le bon niveau de traitement ici
                ]);
    
                return redirect()->route('demandeurs.index')->with('success', 'Le dossier'.$dossier->nomDossier.' a été enregistré en tant que brouillon.');
            }
            // Si l'action est "Soumettre"
            elseif ($action === 'soumettre') {
    
                // Enregistrez l'historique avec le statut 'brouillon'
                Historique::create([
                    'actionHistorique' => $dossier->nomDossier,
                    'statutHistorique' => 'soumis',
                    'commentaireAction' => '',
                    'dateAction' => now(),
                    'idDossier' => $dossier->id,
                    'idUser' => auth()->id(),
                    'idNiveauTraitement' => $niveauTraitement->id, // Assurez-vous d'obtenir le bon niveau de traitement ici
                ]);
    
                return redirect()->route('demandeurs.index')->with('success', 'Le dossier '.$dossier->nomDossier.' a été soumis avec succès.');
            }
            // Si l'action n'est ni "Enregistrer" ni "Soumettre"
            else {
                // Gérez cette situation comme vous le souhaitez (redirection vers une autre page, message d'erreur, etc.)
                return redirect()->route('demandeurs.index')->with('error', 'Action non valide.');
            }

                return redirect()->route('demandeurs.index')->with('success', 'Le dossier' .$dossier->nomDossier. ' a été créé avec succès.');
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
         // dd($dossier);
         $online=auth()->user()->id;
        $recents = Dossier::where('idUser','=',$online)->orderBy('created_at', 'desc')->limit(5)->get();
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierDemandeur.show',compact('dossier','recents', 'users','typeDossiers'));
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
        return view('dossierDemandeur.edit',compact('dossier','recents', 'users','typeDossiers'));
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
  
        return redirect()->route('demandeurs.index')->with('success','Le dossier '.$dossier->nomDossier. ' a été mis à jour');
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
        return redirect()->route('demandeurs.index')->with('success','dossier mis à jour');
    }
    
    
     public function destroy(Dossier $dossier)
    {
        //
        $dossier->delete();
        return redirect()->route('demandeurs.index')->with('success','Le dossier ' .$dossier->nomDossier. ' a été supprimé avec succès');
    }
}
