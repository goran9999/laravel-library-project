<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use \App\Models\User;
use App\Models\Epoch;
use App\Models\Author;
use App\Models\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();
        Epoch::truncate();
        Author::truncate();
        $this->call([
            EpochSeeder::class,
            CategorySeeder::class,

        ]);

        // User::factory(5)->create();
        
        // Author::factory(5)->create();        

        Book::factory(10)->create();
     

       
    }
}
