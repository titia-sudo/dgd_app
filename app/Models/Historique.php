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
    public $timestamps = true;

    protected $fillable=[
        'id',
        'actionHistorique',
        'statutHistorique',
        'commentaireAction',
        'dateAction',
        'idDossier',
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
}
