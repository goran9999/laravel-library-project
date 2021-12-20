<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epoch;
class EpochSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epoch::create([
            'name'=>'Realism',
            'duration'=>90,
            'century'=>19
        ]);
        Epoch::create([
            'name'=>'Classicism',
            'duration'=>75,
            'century'=>18
        ]);
        Epoch::create([
            'name'=>'Romanticism',
            'duration'=>39,
            'century'=>18
        ]);
        Epoch::create([
            'name'=>'Humanism and Renaissance',
            'duration'=>39,
            'century'=>15
        ]);
        Epoch::create([
            'name'=>'Contemporary Literature',
            'duration'=>81,
            'century'=>20
        ]);
        Epoch::create([
            'name'=>'Modernism',
            'duration'=>40,
            'century'=>20
        ]);
    }
}
