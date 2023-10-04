<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direction extends Model
{
    use HasFactory;

    protected $table = 'directions';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nomDirection',
        'sigleDirection'
    ];

    public function services() : HasMany 
    { 
        return $this->hasMany(Service::class, 'idDirection'); 
    }
}
