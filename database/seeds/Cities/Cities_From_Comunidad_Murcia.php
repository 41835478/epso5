<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model\Install;
use Carbon\Carbon;

class Cities_From_Comunidad_Murcia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cities')->insert([
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Abanilla", "city_lat" => "38.2007915", "city_lng" => "-1.0428179", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Abarán", "city_lat" => "38.3020789", "city_lng" => "-1.1642189", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Águilas", "city_lat" => "37.5081709", "city_lng" => "-1.4168464", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Albudeite", "city_lat" => "38.0269039", "city_lng" => "-1.3851118", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Alcantarilla", "city_lat" => "37.9810063", "city_lng" => "-1.2218501", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Alcázares, Los", "city_lat" => "37.7391859", "city_lng" => "-0.8520765", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Aledo", "city_lat" => "37.8823923", "city_lng" => "-1.4574909", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Alguazas", "city_lat" => "38.0515302", "city_lng" => "-1.2112347", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Alhama de Murcia", "city_lat" => "37.8833504", "city_lng" => "-1.140374", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Archena", "city_lat" => "38.1317422", "city_lng" => "-1.3256601", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Beniel", "city_lat" => "38.0459117", "city_lng" => "-1.0018935", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Blanca", "city_lat" => "38.3020789", "city_lng" => "-1.1642189", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Bullas", "city_lat" => "38.0480798", "city_lng" => "-1.6709558", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Calasparra", "city_lat" => "37.611704", "city_lng" => "-1.0414402", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Campos del Río", "city_lat" => "38.0269039", "city_lng" => "-1.3851118", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Caravaca de la Cruz", "city_lat" => "38.104229", "city_lng" => "-1.866195", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Cartagena", "city_lat" => "37.6153948", "city_lng" => "-0.7435246", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Cehegín", "city_lat" => "38.104229", "city_lng" => "-1.866195", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Ceutí", "city_lat" => "38.1317422", "city_lng" => "-1.3256601", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Cieza", "city_lat" => "38.2332202", "city_lng" => "-1.4115797", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Fortuna", "city_lat" => "38.1808694", "city_lng" => "-1.1216112", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Fuente Álamo de Murcia", "city_lat" => "37.8833504", "city_lng" => "-1.140374", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Jumilla", "city_lat" => "38.3020789", "city_lng" => "-1.1642189", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Librilla", "city_lat" => "37.8833504", "city_lng" => "-1.140374", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Lorca", "city_lat" => "37.675267", "city_lng" => "-1.6975995", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Lorquí", "city_lat" => "38.101236", "city_lng" => "-1.2299785", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Mazarrón", "city_lat" => "37.7096043", "city_lng" => "-1.4048705", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Molina de Segura", "city_lat" => "38.0515302", "city_lng" => "-1.2112347", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Moratalla", "city_lat" => "37.7269395", "city_lng" => "-0.8766724", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Mula", "city_lat" => "37.8823923", "city_lng" => "-1.4574909", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Murcia", "city_lat" => "38.1398141", "city_lng" => "-1.366216", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Ojós", "city_lat" => "38.1317422", "city_lng" => "-1.3256601", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Pliego", "city_lat" => "37.8823923", "city_lng" => "-1.4574909", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Puerto Lumbreras", "city_lat" => "37.5637238", "city_lng" => "-1.807043", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Ricote", "city_lat" => "38.1369025", "city_lng" => "-1.333814", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "San Javier", "city_lat" => "37.649927", "city_lng" => "-0.867187", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "San Pedro del Pinatar", "city_lat" => "37.834279", "city_lng" => "-0.7771379", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Santomera", "city_lat" => "37.724572", "city_lng" => "-0.8780402", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Torre-Pacheco", "city_lat" => "37.741801", "city_lng" => "-0.9516243", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Torres de Cotillas, Las", "city_lat" => "38.0008907", "city_lng" => "-1.1773111", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Totana", "city_lat" => "37.7096043", "city_lng" => "-1.4048705", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Ulea", "city_lat" => "38.1369025", "city_lng" => "-1.333814", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Unión, La", "city_lat" => "37.6183837", "city_lng" => "-0.87673", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Villanueva del Río Segura", "city_lat" => "38.1317422", "city_lng" => "-1.3256601", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["country_id" => 1, "state_id" => 14, "region_id" => "11", "city_name" => "Yecla", "city_lat" => "37.6109583", "city_lng" => "-0.9786381", "created_at" => new DateTime, "updated_at" => new DateTime]
      ]);
    }
}
