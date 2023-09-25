<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Dossier; // Assurez-vous que vous avez importé le modèle Dossier ici

class DossierCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Le dossier créé.
     *
     * @var \App\Dossier
     */
    public $dossier;

    /**
     * L'action effectuée.
     *
     * @var string
     */
    public $action;

    /**
     * Create a new event instance.
     *
     * @param \App\Dossier $dossier
     * @param string $action
     * @return void
     */
    public function __construct(Dossier $dossier, $action)
    {
        $this->dossier = $dossier;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}