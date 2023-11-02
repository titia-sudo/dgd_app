<?php

namespace App\Models;

use App\Models\NiveauTraitement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historique extends Model
{
    use HasFactory;

    protected $table = 'historique';
    protected $foreignKey = 'idDossier';
    protected $guarded = [];
    public $timestamps = true;

    protected $fillable=[
        'id',
        'actionHistorique',
        'statutHistorique',
        'commentaireAction',
        'dateAction',
        'idDossier',
        'idNiveauTraitement',
        'idUser'
    ];


    public function dossier():BelongsTo
    {
        return $this->belongsTo(Dossier::class, 'idDossier');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function niveauTraitement():BelongsTo
    {
        return $this->belongsTo(NiveauTraitement::class, 'idNiveauTraitement');
    }
}
