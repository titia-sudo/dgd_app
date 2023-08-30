<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UniteTempsTraitement;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TempsTraitement extends Model
{
    use HasFactory;
    protected $table = 'tempsTraitements';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nombreTempsTraitement',
        'idUniteTempsTraitement'
    ];


    public function UniteTempsTraitement()
    {
        return $this->belongsTo(UniteTempsTraitement::class, 'idUniteTempsTraitement');
    }

    public function NiveauTraitement(): HasMany 
    { 
        return $this->hasMany(NiveauTraitement::class); 
    }
    
}
