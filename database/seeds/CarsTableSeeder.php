<?php

use Illuminate\Database\Seeder;
use App\Cars;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Cars::truncate();
        factory(App\Cars::class, 12)->create();
    }
}
