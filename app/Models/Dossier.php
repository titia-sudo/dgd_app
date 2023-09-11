<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dossier extends Model
{
    use HasFactory;
    protected $table = 'dossiers';
    protected $guarded = [];


    protected  static  function  boot(){
        parent::boot();

        static::creating(function  ($model)  {
            $model->idUser= Auth::id();
        });
    }


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

        public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
