<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            ['name' => 'Abc','city_id'=> 1,'state_id'=>2, 'country_id'=>2],
            ['name' => 'Def','city_id'=> 2,'state_id'=>1,'country_id'=> 1],
        ], );
    }
}
