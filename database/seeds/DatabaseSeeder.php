<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(AdminsTableSeeder::class);
        DB::table('utilities')->insert([
            'type' => 'listing_id',
            'value' => 100000,
        ]);
    }
}
