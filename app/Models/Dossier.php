<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $table = 'dossiers';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nomDossier',
        'declarantDossier',
        'ifuDossier',
        'agrementDossier',
        'destinataireDossier',
        'elementRequeteDossier',
        'texteReferenceDossier',
        'statutDossier',
        'idUser',
        'idTypeDossier',
        'idAnnee'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(Profil::class, 'idUser');
    }

    public function typeDossier():BelongsTo
    {
        return $this->belongsTo(Service::class, 'idTypeDossier');
    }

    public function annee():BelongsTo
    {
        return $this->belongsTo(Annee::class, 'idAnnee');
    }
}
