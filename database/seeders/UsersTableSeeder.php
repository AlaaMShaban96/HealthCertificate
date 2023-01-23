<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => "super admin",
                'code' => 1,
                'branch_id'=>null,
                'phone' => '0921234567',
                'role' => 'super-admin',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Admin",
                'code' => 2,
                'branch_id'=>1,
                'phone' => '0921234568',
                'role' => 'admin',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Monitor",
                'code' => 3,
                'branch_id'=>1,
                'phone' => '0921234569',
                'role' => 'monitor',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Employe",
                'code' => 4,
                'branch_id'=>1,
                'phone' => '0921234570',
                'role' => 'employe',
                'password' => Hash::make("12345678")
            ],
        ]);
            

    }
}
