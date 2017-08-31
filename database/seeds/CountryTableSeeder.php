<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model\Install;
use Carbon\Carbon;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        DB::table('countries')->insert([
            ['id'            => 1, 
            'country_name'  => 'España', 
            'country_lat'   => 40.416691,
            'country_lng'   => -3.700138,
            'created_at'    => new DateTime, 
            'updated_at'    => new DateTime],
        ]);
    }
}
