<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauTraitement_TypeDossier extends Model
{
    use HasFactory;
    protected $table = 'niveautraitement_typedossier';
    protected $fillable = ['idNiveauTraitement', 'idTypeDossier', 'ordreNiveau'];
}
