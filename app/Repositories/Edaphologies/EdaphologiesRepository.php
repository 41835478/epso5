<?php

namespace App\Repositories\Edaphologies;

use App\Repositories\Edaphologies\Edaphology;
use App\Repositories\Edaphologies\Traits\EdaphologiesHelpers;
use App\Repositories\Plots\PlotsRepository;
use App\Repositories\Repository;
use Credentials, Schema;

class EdaphologiesRepository extends Repository
{
    use EdaphologiesHelpers;

    protected $model;
    protected $plots;

    public function __construct(Edaphology $model, PlotsRepository $plots)
    {
        $this->model = $model;
        $this->plots = $plots;
    }

    /**
     * Prepare the database query for the yajra dataTable service
     * @param   string   $columns
     * @param   string   $id [In case we need an extra variable to check with something...]
     * @param   string   $table [Just in case we need to add de table name for avoid ambiguous row names]
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $table = null, $userNull = false, $value = null)
    {
        //The query
        $query = $this->model
            ->select($columns)->where('plot_id', $value->id);
                //The filters
                return $this->filterByRole($query, $table, $value);
    }

    /**
     * Set value from the controller to the Datatable constructor
     * @param string $query
     * @param string $table
     * @param string $userNull when user = null
     * @return object
     */
    protected function filterByRole($query, $table, $userNull = false)
    {
        //Just in case we need to add de table name for avoid ambiguous row names
        $tableWithDot = $table 
            ? $table . '.' 
            : '';
        //Get the plot 
        $user = $userNull->user_id;
        //Conditional query
        return 
            $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
                return $query;
            })
            ->when(Credentials::maxRole() === 'editor', function ($query) use ($tableWithDot) {
                return $query->where($tableWithDot . 'client_id', Credentials::client());
            })
            ->when(Credentials::maxRole() === 'user', function ($query) use ($table, $tableWithDot, $user) {
                //Filter by user
                if(Schema::hasColumn($table, 'user_id')) {
                    return $query->where($tableWithDot . 'user_id', Credentials::id());
                }    
                //Filter by user throw plot table      
                $listOfPlots = $this->plots->listsByUser($user);
                    return $query->whereIn('plot_id', $listOfPlots);
            });
    }
}
