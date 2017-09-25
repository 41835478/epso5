<?php 

namespace App\Services\Geolocation;

use App\Services\Geolocation\GeolocationTrait;

abstract class GeolocationRepository {

    use GeolocationTrait;

    /**
    * Default variables
    */
    protected $crs          = 'EPSG:4326';
    protected $format       = 'text/xml';
    protected $imageFormat  = 'image/png';
    protected $pointZ       = 15.5;         // Zoom for thumbnails
    protected $request      = 'GetFeatureInfo';
    protected $service      = 'WMS';
    protected $spherical    = 20037508.34;  //Spherical curvature
    protected $timeout      = 5;
    protected $version      = '1.1.1';

    /**
    * Custom variables
    */
    protected $bbox;
    protected $height;
    protected $layers;
    protected $pointX;
    protected $pointY;
    protected $width;

    /*
    |--------------------------------------------------------------------------
    | Public methods
    |--------------------------------------------------------------------------
    */
   
     /**
     * Generate the server connection URL
     *
     * @param   string    $server
     * 
     * @return  String.
     */
    public function getServer($server)
    {
        //Built the server URL
        $url = '%s?REQUEST=%s&SERVICE=%s&QUERY_LAYERS=%s&VERSION=%s&INFO_FORMAT=%s&LAYERS=%s&SRS=%s&CRS=%s&BBOX=%s&WIDTH=%s&HEIGHT=%s&FORMAT=%s&STYLES=DEFAULT&TRANSPARENT=FALSE&X=%s&Y=%s&FEATURE_COUNT=1&EXCEPTIONS=XML';
            return sprintf($url, 
                $server, 
                $this->request, 
                $this->service, 
                $this->layers, 
                $this->version, 
                $this->format, 
                $this->layers, 
                $this->crs,
                $this->crs, 
                $this->bbox, 
                $this->width, 
                $this->height, 
                $this->imageFormat, 
                $this->pointX, 
                $this->pointY
            );
    }

    /**
     * Get the SIGPAC reference values from the CATASTRO identification number
     * @param  object $reference
     * @return  SIGPAC reference values
     */
    public function catastroToSigpac($reference)
    {
        //Convert the data to string
        $reference = is_object($reference) 
            ? $reference->get('reference') 
            : $reference;
        //
            return [
                'region'     => substr($reference, 0, 2), 
                'city'       => substr($reference, 2, 3), 
                'aggregate'  => '0', 
                'zone'       => '0', 
                'polygon'    => substr($reference, 6, 3), 
                'plot'       => substr($reference, 9, 5),
            ];
    }

    /*
    |--------------------------------------------------------------------------
    | Protected methods
    |--------------------------------------------------------------------------
    */
   
     /**
     * Load external files
     * We need to send the headers correctly to the wms server, because It can think that we are attacking the server
     *
     * @param file $file
     * @return  String.
     */
    protected function getFile($file)
    {
        //Open the connection
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, self::userAgent());
        curl_setopt($ch, CURLOPT_URL, $file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        //Get the results
        $result = curl_exec($ch);
        //Close the connection
        curl_close($ch);
            //Return the data
            return $result;
    }

     /**
     * Renerate an user agent to emulate an human user
     *
     * @return  String.
     */
    protected function userAgent()
    {
        return array_rand([
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            'Mozilla/5.0 (Windows CE) AppleWebKit/5350 (KHTML, like Gecko) Chrome/13.0.888.0 Safari/5350',
            'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_5) AppleWebKit/5312 (KHTML, like Gecko) Chrome/14.0.894.0 Safari/5312',
            'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20101231 Firefox/3.6',
            'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_1 rv:3.0; en-US) AppleWebKit/534.11.3 (KHTML, like Gecko) Version/4.0 Safari/534.11.3',
            'Opera/8.25 (Windows NT 5.1; en-US) Presto/2.9.188 Version/10.00',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1',
            'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/3.0)',
            'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16'
        ], 1);
    }
}
