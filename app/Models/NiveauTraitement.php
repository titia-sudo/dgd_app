<?php

namespace App\Models;

use App\Models\User;
use App\Models\TempsTraitement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NiveauTraitement extends Model
{
    use HasFactory;

    protected $table = 'niveauTraitements';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nomNiveau',
        'idTempsTraitement'
    ];


    public function TempsTraitement(): BelongsTo
    { 
        return $this->belongsTo(TempsTraitement::class, 'idTempsTraitement'); 
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_niveautraitements', 'idUser', 'idNiveauTraitement');
    }

    public function historique() : HasMany 
    { 
        return $this->hasMany(Historique::class, 'idHistorique'); 
    }
}
