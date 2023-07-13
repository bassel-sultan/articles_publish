<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['php','laravel php','back end development', 'front end development'];
        foreach($tags as $tag){

            Tag::create([
                'name'=>$tag
            ]);
        }
    }
}
