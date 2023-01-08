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
                'email' => "super-admin@admin.com",
                'branch_id'=>null,
                'phone' => '0921234567',
                'role' => 'super-admin',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Admin",
                'email' => "admin@admin.com",
                'branch_id'=>1,
                'phone' => '0921234568',
                'role' => 'admin',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Monitor",
                'email' => "monitor@admin.com",
                'branch_id'=>1,
                'phone' => '0921234569',
                'role' => 'monitor',
                'password' => Hash::make("12345678")
            ],
            [
                'name' => "Employe",
                'email' => "employe@admin.com",
                'branch_id'=>1,
                'phone' => '0921234570',
                'role' => 'employe',
                'password' => Hash::make("12345678")
            ],
        ]);
            

    }
}
