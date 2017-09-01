<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientsListTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Countries 
        $this->call(CountryTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(StateTableSeeder::class);
            $this->call(Cities_From_La_Mancha::class);
            $this->call(Cities_From_Comunidad_Valenciana::class);
            $this->call(Cities_From_Comunidad_Murcia::class);
    }
}
