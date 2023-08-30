<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $guarded = [];

    protected $fillable=[
        'id',
        'nomService',
        'idDirection'
    ];

    public function Direction():BelongsTo
    {
        return $this->belongsTo(Direction::class, 'idDirection');
    }
}
