<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     //$roles = [
       //     ['libelle' => 'ADMIN'],
       //     ['libelle' => 'CLIENT'],
        //    ['libelle' => 'SELLER'],
       // ];

       // foreach ($roles as $role) {
        //    Role::create($role);
       // }
    public function run(): void{

        // Création du rôle Administrateur
        $admin = new Role();
        $admin->libelle = "ADMIN";
        $admin->save();
/////////////////////////////////////////////////////////////
        // Création du rôle Client
        $client = new Role();
        $client->libelle = "CLIENT";
        $client->save();

        // Création du rôle Vendeur
        $seller = new Role();
        $seller->libelle = "SELLER";
        $seller->save();


    }
}
