<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formulaire_user;


class CreateFormulairUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulaire_user= [
            [   
            'uid'=>'ref1',
            'firstName'=>'ali',
            'lastName'=>'zaoua',

            'email'=>'ali@gmail.com',
            'city' => 'Paris',
            'adress' => '12 RUE VALLE DE MARNE ',
            'codePostal' =>  94000,
            'message' => "Création d'une salle de  négociaion acheteur dans le secteur privé...",
            'type' => 'Acheteur secteur public',
            ]
        ];
        foreach ($formulaire_user as $key => $user) {
            Formulaire_user::create($user);
        }
    }
}
