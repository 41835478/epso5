<?php

namespace App\Repositories;

use App\Repositories\_Traits\Role;
use Credentials;

abstract class Repository
{
    use Role;

    /**
     * Get all the fields from storage
     * @param   array   $columns
     * @return  collection
     */
    public function all(array $columns = ['*'])
    {
        return $this->model
            ->get($columns);
    }

    /**
     * Prepare the database query for the yajra dataTable service
     * @param   string   $columns
     * @param   string   $id [In case we need an extra variable to check with something...]
     * @param   string   $table [Just in case we need to add de table name for avoid ambiguous row names]
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $id = null, $table = null)
    {
        //_Traits/Role.php
        return $this->filterByRole($this->model->select($columns), $table);
    }

    /**
     * Get all the results from a model and return in json format.
     * Use for autocomplete...
     * @param string    $term       [The search term]
     * @param string    $row        [DB row to be searched]
     * @param array     $columns    [DB columns to be returned]
     * @return array
     */
    public function ajax($term = null, $row = null, array $columns = [])
    {
        //Null response
        if(!$term) {
            return response()->json(null);
        }

        $columns = !empty($columns) 
            ? $columns 
            : ['id', $row . ' AS name'];

        $query = $this->model
            ->where($row, 'LIKE', '%' . $term . '%')
            ->select($columns[0], $columns[1]);

        return response()->json($query->get());
    }

    /**
     * Get all the results for a $field contents in the $items array
     * @param   string      $columns
     * @return  collection
     */
    public function lists(array $columns = [])
    {
        return $this->model
            ->pluck($columns[1], $columns[0])
            ->toArray();
    }

    /**
     * Get all the results for a $field contents in the $items array
     * @param   string      $columns
     * @param   array       $items
     * @param   string      $field
     * @return  collection
     */
    public function inLists(array $items, array $columns = ['*'], string $field = 'id')
    {
        return $this->model
            ->select($columns)
            ->whereIn($field, $items);
    }

    /**
     * Paginated results
     * @param   int     $perPage
     * @param   array   $columns
     * @return  collection
     */
    public function paginate(int $perPage = 15, array $columns = ['*'])
    {
        return $this->model
            ->paginate($perPage, $columns);
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function store($id = null)
    {
        //Create an Item
        if (is_null($id)) {
            return $this->model
                ->create(request()->all());
        }
        //Update an Item
        if(is_numeric($id)) {
            //Get the item
            $item = $this->model->find($id);
            //Check if the user own the database record
            //and if the role is authorizate
            if(!Credentials::authorize($item)) {
                return Credentials::accessError();
            }
            return $item->update(request()->all());
        }
        return false;
    }

    /**
     * Eliminate a list of items from the DB
     * @return  boolean
     */
    public function eliminate()
    {
        //items_list() from helpers/strings.php
        return $this->inLists(items_list())
            ->delete();
    }

    /**
     * Find a record by its ID value in storage
     * @param   int         $id
     * @param   string      $columns
     * @return  collection
     */
    public function find(int $id, array $columns = ['*'])
    {
        return $this->model
            ->findOrFail($id, $columns);
    }

    /**
     * Find a record where a $field has a $value
     * @param   string  $field
     * @param   mixed   $value
     * @param   array   $columns
     * @return  collection
     */
    public function findBy(string $field, $value, array $columns = ['*'])
    {
        return $this->model
            ->where($field, '=', $value)
            ->get($columns);
    }
}
