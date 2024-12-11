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

        //Proyecto 6

        $userProject = new User_project();
        $userProject->project_id = 6;
        $userProject->user_id = 9;
        $userProject->role = "Backend Developer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 6;
        $userProject->user_id = 4;
        $userProject->role = "Secretario";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 6;
        $userProject->user_id = 5;
        $userProject->role = "Frontend Developer";
        $userProject->save();

        //Proyecto 7

        $userProject = new User_project();
        $userProject->project_id = 7;
        $userProject->user_id = 10;
        $userProject->role = "Scrum Master";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 7;
        $userProject->user_id = 2;
        $userProject->role = "Full Stack Developer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 7;
        $userProject->user_id = 8;
        $userProject->role = "Frontend Developer";
        $userProject->save();

        //Proyecto 8

        $userProject = new User_project();
        $userProject->project_id = 8;
        $userProject->user_id = 1;
        $userProject->role = "Full Stack Developer";
        $userProject->save();

        //Proyecto 9

        $userProject = new User_project();
        $userProject->project_id = 9;
        $userProject->user_id = 9;
        $userProject->role = "DevOps Engineer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 9;
        $userProject->user_id = 1;
        $userProject->role = "Full Stack Developer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 9;
        $userProject->user_id = 5;
        $userProject->role = "Frontend Developer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 9;
        $userProject->user_id = 6;
        $userProject->role = "QA Tester";
        $userProject->save();

        //Proyecto 10

        $userProject = new User_project();
        $userProject->project_id = 10;
        $userProject->user_id = 1;
        $userProject->role = "Data Analyst";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 10;
        $userProject->user_id = 2;
        $userProject->role = "UI/UX Designer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 10;
        $userProject->user_id = 5;
        $userProject->role = "Mobile Developer";
        $userProject->save();

        $userProject = new User_project();
        $userProject->project_id = 10;
        $userProject->user_id = 8;
        $userProject->role = "Full Stack Developer";
        $userProject->save();
    }
}
