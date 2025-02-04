<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Profil;
use App\Models\Service;
use HasRoles;
use Spatie\Permission\Models\Role;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'address',
        'city',
        'country',
        'postal',
        'about',
        'profil',
        'idService'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected function profil(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["demandeur", "validateur", "admin", "superAdmin"][$value],
        );

    }

    
    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function niveauTraitements()
    {
        return $this->belongsToMany(NiveauTraitements::class, 'users_niveautraitements', 'idUser', 'idNiveauTraitement');
    }


    public function profil_d():BelongsTo
    {
        return $this->belongsTo(Profil::class, 'idProfil');
    }

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class, 'idService');
    }
    public function roles()
    {
      return $this->belongsToMany('App\Models\Role');
    }

    public function permissions()
	{
		return $this->belongsToMany('App\Models\Permission');
	}

	public function getRoleListAttribute()
	{
		return $this->roles->pluck('id')->toArray();
	}

        public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
