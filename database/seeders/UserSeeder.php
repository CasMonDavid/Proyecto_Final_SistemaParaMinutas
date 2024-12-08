<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userUno = new User();
        $userUno->name =  'David Alejandro';
        $userUno->email = 'david@gmail.com';
        $userUno->password = bcrypt('123456789');
        $userUno->birthday = '2003-08-20';
        $userUno->save();
        
        $userDos = new User();
        $userDos->name =  'Angel Ivan';
        $userDos->email = 'ivan@gmail.com';
        $userDos->password = bcrypt('123456789');
        $userDos->birthday = '2003-05-01';
        $userDos->save();
        
        $userTres = new User();
        $userTres->name =  'Miguel Angel';
        $userTres->email = 'miguel@gmail.com';
        $userTres->password = bcrypt('123456789');
        $userTres->birthday = '2003-11-27';
        $userTres->save();

        $userCuatro = new User();
        $userCuatro->name =  'John Carlos';
        $userCuatro->email = 'john@gmail.com';
        $userCuatro->password = bcrypt('123456789');
        $userCuatro->birthday = '2003-11-27';
        $userCuatro->save();
    }
}
