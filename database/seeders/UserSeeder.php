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
        // Usuario 1
        $userUno = new User();
        $userUno->name =  'David Alejandro';
        $userUno->email = 'david@gmail.com';
        $userUno->password = bcrypt('123456789');
        $userUno->birthday = '2003-08-20';
        $userUno->save();
        
        // Usuario 2
        $userDos = new User();
        $userDos->name =  'Angel Ivan';
        $userDos->email = 'ivan@gmail.com';
        $userDos->password = bcrypt('123456789');
        $userDos->birthday = '2003-05-01';
        $userDos->save();
        
        // Usuario 3
        $userTres = new User();
        $userTres->name =  'Miguel Angel';
        $userTres->email = 'miguel@gmail.com';
        $userTres->password = bcrypt('123456789');
        $userTres->birthday = '2003-11-27';
        $userTres->save();

        // Usuario 4
        $userCuatro = new User();
        $userCuatro->name =  'John Carlos';
        $userCuatro->email = 'john@gmail.com';
        $userCuatro->password = bcrypt('123456789');
        $userCuatro->birthday = '2003-11-28';
        $userCuatro->save();

        // Usuario 5
        $user = new User();
        $user->name =  'Leonor Kaur';
        $user->email = 'leonkaur123@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '2001-01-12';
        $user->save();

        // Usuario 6
        $user = new User();
        $user->name =  'Maria Auxiliadora';
        $user->email = 'auxmar82y@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '1982-08-21';
        $user->save();

        // Usuario 7
        $user = new User();
        $user->name =  'Yeray Comas';
        $user->email = 'yeyeat@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '1998-05-15';
        $user->save();

        // Usuario 8
        $user = new User();
        $user->name =  'Rufino Falcon';
        $user->email = 'falcon@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '1989-01-01';
        $user->save();

        // Usuario 9
        $user = new User();
        $user->name =  'Olga Maria Ruz';
        $user->email = 'olga@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '1978-11-23';
        $user->save();

        // Usuario 10
        $user = new User();
        $user->name =  'Alondra Lizet';
        $user->email = 'valee@gmail.com';
        $user->password = bcrypt('123456789');
        $user->birthday = '1974-02-09';
        $user->save();
    }
}
