<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\{UniteTempsTraitement, TempsTraitement};


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        
        $users = [
        [
            'username'=>'SuperAdmin User',
            'firstname' => 'Tatiana',
            'lastname' => 'Tatiana',
            'email'=>'SuperAdmin@itsolutionstuff.com',
            'profil'=> 3,
            'password'=> bcrypt('123456'),
            'idProfil'=>4,
            'idService'=>1
        ],
        [
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com',
            'profil' => 2,
            'password' => bcrypt('123456'),
            'idProfil'=>1,
            'idService'=>1
        ], 
        [
            'username'=>'validateur',
            'firstname' => 'Francine',
            'lastname' => 'Francine',
            'email'=>'Validateur@itsolutionstuff.com',
            'profil'=>1,
            'password'=> bcrypt('123456'),
            'idProfil'=>3,
            'idService'=>1
         ],
         [
            'username'=>'demandeur',
            'firstname' => 'Ouedraogo',
            'lastname' => 'Ouedraogo',
            'email'=>'Demandeur@itsolutionstuff.com',
            'profil'=>0,
            'password'=> bcrypt('123456'),
            'idProfil'=>2,
            'idService'=>1
         ],
        ];
   
        foreach ($users as $key => $user) {
            DB::table('users')->insert($user);
        }  

    }
}


?>
