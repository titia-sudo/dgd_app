<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use App\Models\User;
use App\Models\TypeDossier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dossier extends Model
{
    use HasFactory;
    use Notifiable;

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
        'statutFinal',
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

    public function niveauTraitement()
    {
        return $this->belongsTo(NiveauTraitement::class, 'idNiveauTraitement');
    }

    public function historique()
    {
        return $this->hasMany(Historique::class, 'idDossier');
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
