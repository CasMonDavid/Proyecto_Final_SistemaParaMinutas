<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userUno = new User();
        $userDos = new User();
        $userTres = new User();

        $userUno->name =  'David Alejandro';
        $userUno->email = 'david@gmail.com';
        $userUno->password = bcrypt('123456789');
        $userUno->birthday = '2003-08-20';

        $userDos->name =  'Israel Antonio';
        $userDos->email = 'israel@gmail.com';
        $userDos->password = bcrypt('123456789');
        $userDos->birthday = '2003-05-01';

        $userTres->name =  'Miguel Angel';
        $userTres->email = 'angel@gmail.com';
        $userTres->password = bcrypt('123456789');
        $userTres->birthday = '2003-11-27';

        $userUno->save();
        $userDos->save();
        $userTres->save();
    }
}
