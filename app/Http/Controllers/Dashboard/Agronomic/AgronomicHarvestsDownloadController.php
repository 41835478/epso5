<?php

namespace App\Http\Controllers\Dashboard\Agronomic;

use App\DataTables\AgronomicHarvests\DataTable;
use App\Http\Controllers\AgronomicController;
use App\Repositories\AgronomicHarvests\AgronomicHarvestsRepository;
use Credentials;

class AgronomicHarvestsDownloadController extends AgronomicController
{
    /**
     * @var protected
     */
    protected $section = 'agronomic_harvests';
    /**
     * @var private
     */
    private $legend = 'agronomic_harvests';

    public function __construct(AgronomicHarvestsRepository $controller)
    {
        $this->controller   = $controller;
        //Sharing in the view
        view()->share([
            'legend'    => $this->legend,
            'role'      => $this->role,
            'section'   => $this->section,
        ]);
    }

    /**
     * Download file/report
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //Item data
        $item = $this->controller->find($id);
        //Filter by user throw item table 
        //because edaphology has no user_id 
        //because is no mandatory to add user to item...  
        //If item has no user... edaphology has no sense to have one, so the table has not user_id field.   
        if(!Credentials::authorize($item)) {
            return Credentials::accessError();
        }
        return 'Download';
    }
}