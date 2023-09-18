<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
               'username'=>'SuperAdmin User',
               'firstname' => 'Tatiana',
               'lastname' => 'Tatiana',
               'email'=>'SuperAdmin@super.com',
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
               'email'=>'Validateur@it.com',
               'profil'=>1,
               'password'=> bcrypt('123456'),
               'idProfil'=>3,
               'idService'=>1
            ],
            [
               'username'=>'demandeur',
               'firstname' => 'Ouedraogo',
               'lastname' => 'Ouedraogo',
               'email'=>'Demandeur@it2.com',
               'profil'=>0,
               'password'=> bcrypt('123456'),
               'idProfil'=>2,
               'idService'=>1
            ],
           ];

           $role = Role::where('name', 'super-administrateur')->first();
           
           foreach ($users as $user) {
                $newUser = User::create($user);
                // Attachez les rôles aux utilisateurs en fonction du nom d'utilisateur
            if ($newUser->username === 'SuperAdmin User') {
                $newUser->attachRole('super-administrateur');
            } elseif ($newUser->username === 'admin') {
                $newUser->attachRole('administrateur');
            } elseif ($newUser->username === 'validateur') {
                $newUser->attachRole('validateur');
            } elseif ($newUser->username === 'demandeur') {
                $newUser->attachRole('demandeur');
            }
           }  

   
    }
}
