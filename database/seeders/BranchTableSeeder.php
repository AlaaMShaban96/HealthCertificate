<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'name' => "الرويسات",
            ],
            [
                'name' => "شارع 20",
            ],
            [
                'name' => "مشفي الجلاء",
            ]
        ]);
    }
}
