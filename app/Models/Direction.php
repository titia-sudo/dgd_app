<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
