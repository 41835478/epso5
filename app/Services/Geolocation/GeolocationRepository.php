<?php 

namespace App\Services\Geolocation;

abstract class GeolocationRepository {

    /**
     * Get the SIGPAC reference values from the CATASTRO identification number
     * @param  object $reference
     * @return  SIGPAC reference values
     */
    public function catastroToSigpac($reference)
    {
        if (strlen($reference) == 14) {
            $sigpac_region    = substr($reference, 0, 2);
            $sigpac_city      = substr($reference, 2, 3);
            $sigpac_aggregate = 0;
            $sigpac_zone      = 0;
            $sigpac_polygon   = substr($reference, 6, 3);
            $sigpac_plot      = substr($reference, 9, 5);
        }
        return compact('sigpac_region', 'sigpac_city', 'sigpac_aggregate', 'sigpac_zone', 'sigpac_polygon', 'sigpac_plot');
    }
}
