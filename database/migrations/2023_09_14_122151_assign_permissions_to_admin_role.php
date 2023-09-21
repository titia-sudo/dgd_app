<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laratrust\Models\LaratrustPermission;
use Laratrust\Models\LaratrustRole;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Récupérez le rôle "Administrateur"
        $adminRole = LaratrustRole::where('name', 'super-administrateur')->first();

        // Vérifiez si le rôle n'a pas déjà toutes les permissions
        if ($adminRole) {
        // Récupérez toutes les permissions existantes
        $permissions = LaratrustPermission::all();

        // Attachez chaque permission au rôle "Administrateur"
        foreach ($permissions as $permission) {
            if (!$adminRole->permissions->contains($permission)) 
            {
                $adminRole->attachPermission($permission);
            }
        }
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_role', function (Blueprint $table) {
            //
        });
    }
};
