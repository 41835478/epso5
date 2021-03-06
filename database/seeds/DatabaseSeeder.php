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
        $this->call(AdministrationsTableSeeder::class);
        $this->call(BiocidesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(CropsTableSeeder::class);
        $this->call(CropVarietiesTableSeeder::class);
        $this->call(CropVarietyTypesTableSeeder::class);
        $this->call(IrrigationsTableSeeder::class);
        $this->call(PatternsTableSeeder::class);
        $this->call(PestsTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WorkersTableSeeder::class);
        
        //Configuration relationships!!!!
        $this->call(ClientConfigTableSeeder::class);
        $this->call(ClientCropTableSeeder::class);
        $this->call(ClientIrrigationTableSeeder::class);
        $this->call(ClientRegionTableSeeder::class);
        $this->call(ClientTrainingTableSeeder::class);

        // Countries 
        $this->call(CitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);

        //The last one: because need for all the previus seed to populate!!!
        $this->call(PlotsTableSeeder::class);
        $this->call(MachinesTableSeeder::class);

        //Climatic
        $this->call(ClimaticStationsTableSeeder::class);

        // Agronomics
        $this->call(AgronomicBiocidesTableSeeder::class);
        $this->call(AgronomicIrrigationsTableSeeder::class);
        $this->call(AgronomicPestsTableSeeder::class);
        $this->call(AgronomicIncidentsTableSeeder::class);
        $this->call(AgronomicHarvestsTableSeeder::class);
        $this->call(AgronomicCulturalsTableSeeder::class);
    }
}
