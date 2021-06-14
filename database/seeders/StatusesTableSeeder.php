<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(array(
            0 => array(
                'status_name' => 'open'
            ),
            1 => array(
                'status_name' => 'closed'
            ),
            2 => array(
                'status_name' => 'unassigned'
            ),
            3 => array(
                'status_name' => 'unresolved'
            )
        ));
    }
}
