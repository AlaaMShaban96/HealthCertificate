<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\BranchTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create(); 
        $this->call(BranchTableSeeder::class);
        $this->call(IdentityTypeSeed::class);
        $this->call(NationalitySeed::class);
        $this->call(TestSeed::class);
        $this->call(UsersTableSeeder::class);

    }
}
