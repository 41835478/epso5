<?php 

namespace App\Repositories\_Traits;

use Credentials;

trait Role
{
    /**
     * Set value from the controller to the Datatable constructor
     * @param string $query
     * @param string $table
     * @return object
     */
    protected function filterByRole($query, $table)
    {
        //Just in case we need to add de table name for avoid ambiguous row names
        $table = $table ? $table . '.' : '';
        //Conditional query
        return 
            $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
                return $query;
            })
            ->when(Credentials::maxRole() === 'editor', function ($query) use ($table) {
                return $query->where($table . 'client_id', Credentials::client());
            })
            ->when(Credentials::maxRole() === 'user', function ($query) use ($table) {
                return $query->where($table . 'user_id', Credentials::id());
            });
    }
}