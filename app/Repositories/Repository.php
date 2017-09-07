<?php

namespace App\Repositories;

use Credentials;

abstract class Repository
{
    /**
     * Get all the fields from storage
     * @param   string   $columns
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
     * @return  ajax
     */
    public function dataTable(array $columns = ['*'], $id = null)
    {
        return $this->model
            ->select($columns)
            ->when(Credentials::maxRole() === 'god' || Credentials::maxRole() === 'admin', function ($query) {
                return $query;
            })
            ->when(Credentials::maxRole() === 'editor', function ($query) {
                return $query->where('client_id', Credentials::client());
            })
            ->when(Credentials::maxRole() === 'user', function ($query) {
                return $query->where('user_id', Credentials::id());
            });
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
     * @param   boolean     $firstFieldEmpty
     * @return  collection
     */
    public function lists(array $columns = [], bool $firstFieldEmpty = false)
    {
        $query = $this->model
            ->pluck($columns[1], $columns[0])
            ->toArray();
        return $firstFieldEmpty ? ['' => ''] + $query : $query;
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
            ->first($columns);
    }
}
