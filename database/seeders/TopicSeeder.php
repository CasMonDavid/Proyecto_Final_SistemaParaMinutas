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
    }
}
