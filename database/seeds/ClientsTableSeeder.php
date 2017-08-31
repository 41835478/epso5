<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([  
            'id'                        => 1, 
            'client_name'               => 'EPSO', 
            'client_contact'            => 'David B. López Lluch', 
            'client_address'            => 'Carretera de Beniel, Km. 3,2', 
            'client_nif'                => 'Q5350015C', 
            'client_telephone'          => '966 749 807', 
            'client_city'               => 'Orihuela', 
            'client_region'             => 'Alicante', 
            'client_state'              => 'Comunidad Valenciana', 
            'client_country'            => 'España', 
            'client_zip'                => '03312', 
            'client_email'              => 'david.lopez@umh.es',
            'client_web'                => 'http://agroepso.es',
            'client_image'              => '1.gif',
            'client_json_permission' => collect([
                'plot_create'           => 1,
                'plot_edit'             => 1,
                'plot_delete'           => 1,
                'agronomic_create'      => 1,
                'agronomic_edit'        => 1,
                'agronomic_delete'      => 1,
                'edaphology_create'     => 1,
                'edaphology_edit'       => 1,
                'edaphology_delete'     => 1,
                'climatic_create'       => 1,
                'climatic_edit'         => 1,
                'climatic_delete'       => 1,
                'geolocation'           => 1,
            ]),
            'client_json_configuration' => collect([
                'plots' => [
                    'create'            => 1,
                    'list'              => 1,
                ],
            ]),
            'client_json_crops' => collect([1]),
            'client_json_regions' => collect([50, 51, 52]),
            'created_at'                => new DateTime, 
            'updated_at'                => new DateTime
        ]); 

        DB::table('clients')->insert([  
            'id'                        => 2, 
            'client_name'               => 'D.O. VALENCIA', 
            'client_contact'            => 'Carmen Martinez', 
            'client_address'            => 'C/. Quart, 22', 
            'client_nif'                => '0000000000', 
            'client_telephone'          => '96 391 00 96', 
            'client_city'               => 'Valencia', 
            'client_region'             => 'Valencia', 
            'client_state'              => 'Comunidad Valenciana', 
            'client_country'            => 'España', 
            'client_zip'                => '46001', 
            'client_email'              => 'admon@vinovalencia.org',
            'client_web'                => 'http://vinovalencia.org',
            'client_image'              => '2.png',
            'client_json_permission' => collect([
                'plot_create'           => 1,
                'plot_edit'             => 1,
                'plot_delete'           => 1,
                'agronomic_create'      => 1,
                'agronomic_edit'        => 1,
                'agronomic_delete'      => 1,
                'edaphology_create'     => 0,
                'edaphology_edit'       => 0,
                'edaphology_delete'     => 0,
                'climatic_create'       => 0,
                'climatic_edit'         => 0,
                'climatic_delete'       => 0,
                'geolocation'           => 1,
            ]),
            'client_json_crops' => collect([1]),
            'client_json_regions' => collect([50, 51, 52]),
            'created_at'                => new DateTime, 
            'updated_at'                => new DateTime
        ]);  
    }
}
