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

$admin = new Role();
$admin->libelle = "Administrateur";
$admin->save();


    }
}
