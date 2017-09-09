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
        // General seeders 
        $this->call(ClientsListTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(CropTableSeeder::class);
        $this->call(IrrigationsTableSeeder::class);
        $this->call(PlotsTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Crops Varieties 
        $this->call(Vineyard_Varieties_TableSeeder::class);
        $this->call(Vineyard_CVT_TableSeeder::class);

        // Crops Patterns
        $this->call(Vineyard_Patterns_TableSeeder::class);
        
        // Crops Pests
        $this->call(Vineyard_Pests_TableSeeder::class);

        // Countries 
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
            $this->call(Cities_From_La_Mancha::class);
            $this->call(Cities_From_Comunidad_Valenciana::class);
            $this->call(Cities_From_Comunidad_Murcia::class);
    }
}
