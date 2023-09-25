<?php

namespace App\Listeners;

use App\Models\Historique;
use App\Events\DossierCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DossierCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  DossierCreated  $event
     * @return void
     */
    public function handle(DossierCreated $event)
    {
        // Récupérez les informations du dossier créé à partir de l'événement
        Log::info('Dans le listener');
        $dossier = $event->dossier;
        $action = $event->action;
        dd('Dans le listener');

        // Enregistrez ces informations dans la table d'historique
        Historique::create([
            'actionHistorique' => $action,
            'statutHistorique' => 'Nouveau dossier créé : ' . $dossier->nom,
            'dateAction' => now(),
            'idDossier' => $dossier->id,
            'idUser' => Auth::id(), // Utilisateur actuel
            // Autres champs d'historique que vous souhaitez enregistrer
        ]);
    }
}
