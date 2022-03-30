<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Abc','state_id'=>2, 'country_id'=>2],
            ['name' => 'Def','state_id'=>1,'country_id'=> 1],
        ], );
    }
}
