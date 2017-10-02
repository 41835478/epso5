<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Repositories\Edaphologies\EdaphologiesRepository;
use App\Repositories\Plots\PlotsRepository;
use Credentials, PDF;

class EdaphologiesDownloadController extends DashboardController
{
    /**
     * @var protected
     */
    protected $controller;
    protected $plots;
    /**
     * @var protected
     */
    protected $fileName     = 'analysis';
    protected $section      = 'edaphologies';

    public function __construct(EdaphologiesRepository $controller, PlotsRepository $plots)
    {
        $this->controller = $controller;
        $this->plots      = $plots;
    }

    /**
     * Download the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //Plot data
        $plot = $this->plots->find($id);
        //Filter by user throw plot table 
        //because edaphology has no user_id 
        //because is no mandatory to add user to plot...  
        //If plot has no user... edaphology has no sense to have one, so the table has not user_id field.   
        if(!Credentials::authorize($plot)) {
            return Credentials::accessError();
        }
        //Samples
        $edaphologies = $this->controller
            ->dataTable($columns = ['*'], $table = 'edaphologies', $userNull = false, $plot)
            ->select($this->section . '.*')
            ->with('crop')
            ->orderBy('edaphology_level', 'ASC')
            ->get();
        //The pdf
        $pdf = PDF::loadView(dashboard_path($this->section . '.download'), compact('edaphologies', 'plot'));
        return $pdf->download(self::getName($id));
    }

    /**
     * Get the file name
     *
     * @return string
     */
    private function getName($id) {
        return sprintf('%s-%s.pdf', $this->fileName, $id);
    }
}