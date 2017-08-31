<?php

use Illuminate\Database\Seeder;

class DatabaseSeederTesting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientsTableSeeder::class);
        $this->call(UsersTestingTableSeeder::class);
    }
}
