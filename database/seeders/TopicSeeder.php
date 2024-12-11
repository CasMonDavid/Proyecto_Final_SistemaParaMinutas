<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tema 1
        $topic = new Topic();
        $topic->minuta_id = 1;
        $topic->save();

        //Tema 2
        $topic = new Topic();
        $topic->minuta_id = 2;
        $topic->save();

        //Tema 3
        $topic = new Topic();
        $topic->minuta_id = 3;
        $topic->save();

        //Tema 4
        $topic = new Topic();
        $topic->minuta_id = 4;
        $topic->save();

        //Tema 5
        $topic = new Topic();
        $topic->minuta_id = 5;
        $topic->save();

        //Tema 6
        $topic = new Topic();
        $topic->minuta_id = 1;
        $topic->save();

        //Tema 7
        $topic = new Topic();
        $topic->minuta_id = 2;
        $topic->save();

        //Tema 8
        $topic = new Topic();
        $topic->minuta_id = 3;
        $topic->save();

        //Tema 9
        $topic = new Topic();
        $topic->minuta_id = 9;
        $topic->save();

        //Tema 10
        $topic = new Topic();
        $topic->minuta_id = 10;
        $topic->save();

        //Tema 11
        $topic = new Topic();
        $topic->minuta_id = 11;
        $topic->save();

        //Tema 12
        $topic = new Topic();
        $topic->minuta_id = 12;
        $topic->save();

        //Tema 13
        $topic = new Topic();
        $topic->minuta_id = 13;
        $topic->save();

        //Tema 14
        $topic = new Topic();
        $topic->minuta_id = 14;
        $topic->save();

        //Tema 15
        $topic = new Topic();
        $topic->minuta_id = 15;
        $topic->save();

        //Tema 16
        $topic = new Topic();
        $topic->minuta_id = 2;
        $topic->save();

        //Tema 17
        $topic = new Topic();
        $topic->minuta_id = 7;
        $topic->save();

        //Tema 18
        $topic = new Topic();
        $topic->minuta_id = 13;
        $topic->save();

        //Tema 19
        $topic = new Topic();
        $topic->minuta_id = 2;
        $topic->save();

        //Tema 20
        $topic = new Topic();
        $topic->minuta_id = 8;
        $topic->save();
    }
}
