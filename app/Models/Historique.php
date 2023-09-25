<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Historique extends Model
{
    use HasFactory;

    protected $table = 'historique';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'actionHistorique',
        'statutHistorique',
        'commentaireAction',
        'dateAction',
        'idDossier',
        'idUser'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($dossier) {
            // Vous pouvez remplacer cela par l'utilisateur approprié
            $userId = auth()->id();

            // Créez une nouvelle entrée dans la table d'historique
            Historique::create([
                'actionHistorique' => 'Nouveau dossier créé : ' . $dossier->nom,
                'statutHistorique' => $dossier->statutHistorique,
               // 'commentaireAction' => $historique->commentaireAction,
                'dateAction' => now(),
                'idDossier' => $dossier->id,
                'idUser' => auth()->id(),
            ]);
            //dd('Historique created');
        });
        
    }


    public function dossier():BelongsTo
    {
        return $this->belongsTo(Dossier::class, 'idDossier');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
