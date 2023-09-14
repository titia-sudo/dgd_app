<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;


class PermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Insérez des données dans la table permission_user ici
         DB::table('permission_user')->insert([
            'permission_id' => 1, // Remplacez par l'ID de la permission
            'user_id' => 1, // Remplacez par l'ID de l'utilisateur
            'user_type' => 'App\\User', // Remplacez par le modèle de l'utilisateur
        ]);
    }
}
