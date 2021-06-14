<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Ticket;
class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach(range(1, 30) as $index){
            Ticket::create([
                'status_id' => $faker->numberBetween(1,4),
                'requestor_email' => $faker->email,
                'subject' => $faker->word(15),
                'concern' => $faker->sentence,
            ]);
        }
    }
}
