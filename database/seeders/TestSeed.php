<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            [
            'name_ar' =>'فيروس نقص المناعة',
            'name_en' =>'HIV',
            'positive' =>'موجب',
            'negative' =>'خالي من فيروس نقص المناعة',
            ],
            [
            'name_ar' =>'فيروس التهاب الكبد البائي ',
            'name_en' =>'HBSAg',
            'positive' =>'موجب',
            'negative' =>'خالي من فيروس التهاب الكبد البائي',
            ],
            [
            'name_ar' =>'فيروس التهاب الكبد الجيمي ',
            'name_en' =>'HCV',
            'positive' =>'موجب',
            'negative' =>'خالي من فيروس التهاب الكبد الجيمي',
            ],
            [
            'name_ar' =>'مرض الزهري',
            'name_en' =>'VDRL',
            'positive' =>'موجب',
            'negative' =>'خالي من مرض الزهري',
            ],
            [
            'name_ar' =>' فيروس كورونا',
            'name_en' =>'covid-19',
            'positive' =>'موجب',
            'negative' =>'خالي من فيروس كورونا',
            ],
        
    ]);
    }
}
