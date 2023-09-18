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
        $this->call(UserSeeder::class);
        $this->call(PermissionUserSeeder::class);


    }
}


?>
