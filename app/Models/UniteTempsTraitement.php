<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteTempsTraitement extends Model
{
    use HasFactory;
    protected $table = 'uniteTempsTraitements';

    protected $fillable=[
        'id',
        'designationUniteTempsTraitement'
    ];

    public function tempsTraitements() : HasMany 
{ 
    return $this->hasMany(TempsTraitement::class); 
}
}
