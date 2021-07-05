<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentityTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identity_types')->insert([
            ['name' =>'بطاقة شخصية'],
            ['name' =>'جواز سفر'],
            ['name' =>'تعريف'],
            ['name' =>'رقم وطني'],
            ['name' =>'شهادة ميلاد'],
            ['name' =>'لايوجد']
        ]);
    }
}
