<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            return $this->hasMany(TypeDossier::class); 
        }
}
