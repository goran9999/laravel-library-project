<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Action and Adventure'
        ]);
        Category::create([
            'name'=>'Classic'
        ]);
        Category::create([
            'name'=>'Drama'
        ]);
    }
}
