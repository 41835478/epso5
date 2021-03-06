<?php

namespace App\Jobs;

use App\Repositories\Geolocations\Geolocation;
use App\Services\Geolocation\Servers\Nominatim;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeolocationZip implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $geolocation;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($geolocation)
    {
        $this->geolocation = $geolocation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $zipCode = app(Nominatim::class)->handler(request());
        return $this->geolocation->update([
            'geo_zip' => $zipCode,
        ]);
    }
}
