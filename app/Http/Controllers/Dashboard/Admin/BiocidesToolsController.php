<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\DashboardController;
use App\Repositories\Biocides\Biocide;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BiocidesToolsController extends DashboardController
{
    /**
     * @var protected
     */
    protected $file     = 'biocides.csv';
    protected $server   = 'http://www.mapama.gob.es/es/agricultura/temas/sanidad-vegetal/productos-fitosanitarios/registro/productos/ListadoProductos.asp';

    /**
     * @var private
     */
    private $role     = 'admin';
    private $section  = 'biocides';

    public function __construct()
    {
        //Sharing in the view
        view()->share([
            'section'   => $this->section,
            'role'      => $this->role
        ]);
    }

    /**
     * Display tools for biocides.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.' . $this->section . '.tools')->withServer($this->server);
    }

    /**
     * Add biocides to the database if this are news
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try {
            Excel::filter('chunk')->load(storage_path('app/downloads/' . $this->file))->chunk(250, function($results)
            {
                $results->each(function($row) {
                        $flight = Biocide::updateOrCreate([
                            'biocide_num'       => $row->registro,
                            'biocide_name'      => $row->nombre, 
                            'biocide_company'   => $row->empresa,
                            'biocide_formula'   => $row->formula,
                        ]);
                });
            });
            //
            return redirect()
                ->route('dashboard.' . $this->role . '.' . $this->section . '.tools')
                ->withStatus(__('The item has been create successfuly'));
        } catch (\Exception $e) {
            redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    __('An error occurred during the creating process'), 
                    __('If the error persist, please contact with the system administrator'),
                    $e->getMessage()
                ]);
        }
    }
}
