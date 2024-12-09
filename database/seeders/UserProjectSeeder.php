<?php

namespace Database\Seeders;

use App\Models\User_project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Proyecto 1

        $userProject = new User_project();
        $userProject->project_id = 1;
        $userProject->user_id = 1;
        $userProject->role = "Colaborador";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 1;
        $userProject->user_id = 3;
        $userProject->role = "Ingeniero";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 1;
        $userProject->user_id = 4;
        $userProject->role = "Auxiliar";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 1;
        $userProject->user_id = 2;
        $userProject->role = "Colaborador";
        $userProject->save();

        //Proyecto 2

        $userProject = new User_project();
        $userProject->project_id = 2;
        $userProject->user_id = 3;
        $userProject->role = "Administrativo";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 2;
        $userProject->user_id = 4;
        $userProject->role = "Auxiliar";
        $userProject->save();

        //Proyecto 3

        $userProject = new User_project();
        $userProject->project_id = 3;
        $userProject->user_id = 1;
        $userProject->role = "Colaborador";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 3;
        $userProject->user_id = 2;
        $userProject->role = "Colaborador";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 3;
        $userProject->user_id = 3;
        $userProject->role = "Colaborador";
        $userProject->save();

        //Proyecto 4

        $userProject = new User_project();
        $userProject->project_id = 4;
        $userProject->user_id = 4;
        $userProject->role = "Sub-director";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 4;
        $userProject->user_id = 2;
        $userProject->role = "Secretario";
        $userProject->save();
    }
}
