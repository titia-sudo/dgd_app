<?php

namespace App\Models;

use App\Models\Dossier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDossier extends Model
{
    use HasFactory;
    protected $table = 'typeDossiers';

    protected $fillable=[
        'id',
        'designationTypeDossier',
        'nombreNiveauTraitement'
    ];

    public function dossiers() : HasMany 
        { 
            return $this->hasMany(Dossier::class); 
        }

    public function niveauTraitement()
    {
        return $this->belongsToMany(NiveauTraitement::class, 'niveautraitement_typedossier', 'idTypeDossier', 'idNiveauTraitement')
                    ->withPivot('ordreNiveau');
    }
}
