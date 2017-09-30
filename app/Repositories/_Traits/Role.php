<?php 

namespace App\Repositories\_Traits;

use Credentials, Schema;

trait Role
{
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
        $tableRoute = $table ? $table . '.' : '';
        //Conditional query
        return 
            $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
                return $query;
            })
            ->when(Credentials::maxRole() === 'editor', function ($query) use ($tableRoute) {
                return $query->where($tableRoute . 'client_id', Credentials::client());
            })
            ->when(Schema::hasColumn($table, 'user_id') && Credentials::maxRole() === 'user', function ($query) use ($tableRoute) {
                return $query->where($tableRoute . 'user_id', Credentials::id());
            })
            ->when(Schema::hasColumn($table, 'user_id') && $userNull, function ($query) {
                return $query->where('user_id', null);
            });
    }
}