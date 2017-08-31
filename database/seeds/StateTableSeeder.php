<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model\Install;
use Carbon\Carbon;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        DB::table('states')->insert([
            ['id' => '1', 'country_id' => 1, 'state_name' => 'Andalucía', 'state_lat' => 37.5442706, 'state_lng' => -4.7277528, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'country_id' => 1, 'state_name' => 'Aragón', 'state_lat' => 41.5976275, 'state_lng' => -0.9056623, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'country_id' => 1, 'state_name' => 'Asturias, Principado de', 'state_lat' => 43.2504393, 'state_lng' => -5.9832577, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'country_id' => 1, 'state_name' => 'Baleares, Islas', 'state_lat' => 39.5341789, 'state_lng' => 2.8577105, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'country_id' => 1, 'state_name' => 'Canarias', 'state_lat' => 28.2915637, 'state_lng' => -16.6291304, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'country_id' => 1, 'state_name' => 'Cantabria', 'state_lat' => 43.1828396, 'state_lng' => -3.9878427, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'country_id' => 1, 'state_name' => 'Castilla y León', 'state_lat' => 41.8356821, 'state_lng' => -4.3976357, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'country_id' => 1, 'state_name' => 'Castilla - La Mancha', 'state_lat' => 39.2795607, 'state_lng' => -3.097702, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'country_id' => 1, 'state_name' => 'Cataluña', 'state_lat' => 41.5911589, 'state_lng' => 1.5208624, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'country_id' => 1, 'state_name' => 'Comunidad Valenciana', 'state_lat' => 39.4840108, 'state_lng' => -0.7532809, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'country_id' => 1, 'state_name' => 'Extramadura', 'state_lat' => 39.4937392, 'state_lng' => -6.0679194, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'country_id' => 1, 'state_name' => 'Galicia', 'state_lat' => 42.5750554, 'state_lng' => -8.1338558, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'country_id' => 1, 'state_name' => 'Madrid, Comunidad de', 'state_lat' => 40.4166909, 'state_lng' => -3.7003454, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'country_id' => 1, 'state_name' => 'Murcia, Región de', 'state_lat' => 37.9834449, 'state_lng' => -1.1298897, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'country_id' => 1, 'state_name' => 'Navarra, Comunidad Foral de', 'state_lat' => 42.6953909, 'state_lng' => -1.6760691, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'country_id' => 1, 'state_name' => 'País Vasco', 'state_lat' => 42.9896248, 'state_lng' => -2.6189273, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '17', 'country_id' => 1, 'state_name' => 'Rioja, La', 'state_lat' => 36.9450225, 'state_lng' => -2.4631181, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '18', 'country_id' => 1, 'state_name' => 'Ceuta', 'state_lat' => 35.8882871, 'state_lng' => -5.3161949, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '19', 'country_id' => 1, 'state_name' => 'Melilla', 'state_lat' => 35.2923388, 'state_lng' => -2.9387938, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ]);
    }
}
