<?php

namespace App\Models;

use App\Models\User;
use App\Models\TypeDossier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
       // 'idAnnee'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function typeDossier():BelongsTo
    {
        return $this->belongsTo(TypeDossier::class, 'idTypeDossier');
    }

   // public function annee():BelongsTo
    //{
       // return $this->belongsTo(Annee::class, 'idAnnee');
   // }

        public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
