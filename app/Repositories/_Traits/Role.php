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
        $tableWithDot = $table 
            ? $table . '.' 
            : '';
        //Check if table exists 
        $checkTable = Schema::hasColumn($table, 'user_id');
        //Conditional query
        return 
            $query->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
                return $query;
            })
            ->when(Credentials::maxRole() === 'editor', function ($query) use ($tableWithDot) {
                return $query->where($tableWithDot . 'client_id', Credentials::client());
            })
            ->when($checkTable && Credentials::maxRole() === 'user', function ($query) use ($tableWithDot) {
                return $query->where($tableWithDot . 'user_id', Credentials::id());
            })
            ->when($checkTable && $userNull, function ($query) {
                return $query->where('user_id', null);
            });
    }
}