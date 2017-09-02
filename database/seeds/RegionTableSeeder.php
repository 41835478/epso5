<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model\Install;
use Carbon\Carbon;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['id' => '1', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Albacete', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Ciudad Real', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Cuenca', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Guadalajara', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Toledo', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Huesca', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Teruel', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Zaragoza', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'country_id' => 1,'state_id' => 18, 'region_name' => 'Ceuta', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'country_id' => 1,'state_id' => 13, 'region_name' => 'Madrid', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'country_id' => 1,'state_id' => 14, 'region_name' => 'Murcia', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'country_id' => 1,'state_id' => 19, 'region_name' => 'Melilla', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'country_id' => 1,'state_id' => 15, 'region_name' => 'Navarra', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Almería', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Cádiz', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Córdoba', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '17', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Granada', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '18', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Huelva', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '19', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Jaén', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '20', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Málaga', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '21', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Sevilla', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '22', 'country_id' => 1,'state_id' => 3, 'region_name' => 'Asturias', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '23', 'country_id' => 1,'state_id' => 6, 'region_name' => 'Cantabria', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '24', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Ávila', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '25', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Burgos', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '26', 'country_id' => 1,'state_id' => 7, 'region_name' => 'León', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '27', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Palencia', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '28', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Salamanca', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '29', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Segovia', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '30', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Soria', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '31', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Valladolid', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '32', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Zamora', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '33', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Barcelona', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '34', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Gerona', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '35', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Lérida', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '36', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Tarragona', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '37', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Badajoz', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '38', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Cáceres', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '39', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Coruña, La', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '40', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Lugo', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '41', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Orense', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '42', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Pontevedra', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '43', 'country_id' => 1, 'state_id' => 17, 'region_name' => 'Rioja, La', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '44', 'country_id' => 1, 'state_id' => 4, 'region_name' => 'Baleares, Islas', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '45', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Álava', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '46', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Guipúzcoa', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '47', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Vizcaya', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '48', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Palmas, Las', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '49', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Tenerife, Santa Cruz De', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '50', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Alicante', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '51', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Castellón', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '52', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Valencia', 'region_lat' => null, 'region_lng' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ]);
    }
}
