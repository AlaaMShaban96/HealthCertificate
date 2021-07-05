<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->insert([
            ['name' =>'ليبي'],
            ['name' =>'مصري'],
            ['name' =>'تونسي'],
            ['name' =>'مغربي'],
            ['name' =>'جزائري'],
            ['name' =>'اردني'],
            ['name' =>'فلسطني'],
        ]);
    }
}
