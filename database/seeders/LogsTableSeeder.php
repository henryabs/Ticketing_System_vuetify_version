<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Log;
class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach(range(1, 30) as $index){
            Log::create([
                'type' => 'info',
                'message' => $faker->sentence(),
            ]);
        }
    }
}
