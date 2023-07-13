<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catagories=['Science','Sports','Entertainment'];
        foreach($catagories as $category){

            Category::create([
                'name'=>$category
            ]);
        }

    }
}
