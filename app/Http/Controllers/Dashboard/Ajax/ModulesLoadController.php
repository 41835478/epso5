<?php

namespace App\Http\Controllers\Dashboard\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Plots\PlotsRepository;
use Illuminate\Http\Request;

class ModulesLoadController extends Controller
{
    protected $plot;

    public function __construct(PlotsRepository $plot)
    {
        $this->plot = $plot;
    }

    /**
     * Get an ajax response
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke()
    {
        list($clientId, $cropId, $cropName, $module, $type) = self::setRequest();
        $data = [
            'client_id' => $clientId,
            'crop_id'   => $cropId,
            'type'      => $type,
        ];
        if ($clientId && $cropId && $cropName && $module) {
            list($cropTypes, $cropPatterns, $cropVarieties, $cropTrainig) = $this->plot->getCrop($data);
            return view(module_path($module), compact('cropId', 'cropName', 'cropPatterns', 'cropTrainig', 'cropTypes', 'cropVarieties', 'module'));
        }
        return view(module_path('error'));
    }
    
    /**
     * Set the request varialbes
     * @return array
     */
    private function setRequest()
    {
        return [request('client'), request('cropId'), request('cropName'), request('module'), request('type')];
    }
}