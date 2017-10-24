<?php 

namespace App\Repositories\Users;

use App\Repositories\Profiles\ProfilesRepository;
use App\Repositories\Repository;
use App\Repositories\Users\Traits\UsersHelpers;
use App\Repositories\Users\User;
use Credentials, DB;

class UsersRepository extends Repository {

    use UsersHelpers;

    //protected $image;
    protected $model;
    protected $profile;
 
    // public function __construct(User $model, Images $image)
    // {
    //     $this->image = $image;
    //     $this->model = $model;
    // }

    public function __construct(User $model, ProfilesRepository $profile)
    {
        $this->model    = $model;
        $this->profile  = $profile;
    }

    /**
     * Create or update a record in storage
     * @param   int     $id
     * @return  boolean
     */
    public function store($id = null)
    {
        return DB::transaction(function () use ($id) {
            //Operations: App\Repositories\Users\Traits\UsersHelpers;
            $request = $this->requestOperations();
            //
            //Create an User
            if (is_null($id)) {
                $user = $this->model
                    ->create($request);

                //Create an profile
                //Remember: profile()
                if($user) {
                    return $user->profile()
                    ->create($request);
                }
            }
            //
            //Update an User
            if(is_numeric($id)) {
                $user = $this->model
                    ->find($id);

                //Update the profile
                ////Remember: profile
                if($user->update($request)) {
                    return $user->profile
                        ->update($request);
                }
            }
        });
        //Create an error
        return false;
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
        $query = $this->model->select($columns);
            //The filters
            return $this->customFilterByRole($query, $table);
    }

    /**
     * customFilterByRole by role and empty users
     * @param   object   $query
     * @param   string   $table
     * @return  ajax
     */
    protected function customFilterByRole($query, $table)
    {
        //Just in case we need to add de table name for avoid ambiguous row names
        $table = $table ? $table . '.' : '';
        //Response
        return $query->when(Credentials::maxRole() === 'god', function ($query) {
            return $query;
        })
        ->when(Credentials::maxRole() === 'admin', function ($query) use ($table) {
            return $query->where($table . 'is_god', false);
        })
        ->when(Credentials::maxRole() === 'editor', function ($query) use ($table) {
            return $query
                ->where($table . 'is_god', false)
                ->where($table . 'is_admin', false)
                ->where($table . 'client_id', Credentials::client());
        })
        ->when(Credentials::maxRole() === 'user', function ($query) use ($table) {
            return $query->where($table . 'user_id', Credentials::id());
        });
    }

    /**
     * Eliminate a list of items from the DB
     * @return  boolean
     */
    public function eliminate()
    {
        //items_list() from helpers/strings.php
        return DB::transaction(function () {
            //App\Repositories\Users\Traits\UsersHelpers;
            // if($this->deleteUsers() && $this->deleteProfiles()) {
            //     return true;
            // }
            if($this->deleteUsers()) {
                return true;
            }
            return false;
        });
    }

    /**
     * List of users by role
     * Only return the list of user if the role is editor.
     * Use the Credentials::config() facade, throw the helper getConfig(), to get the client ID
     * @param  integer $client
     * @return  array
     */
    public function listOfUsersByRole($client = null)
    {
        if(Credentials::isEditor()) {
            return $this->model
                ->withTrashed()
                ->where('client_id', $client ?? getConfig('client', 'id'))
                ->pluck('name', 'id')
                ->toArray();
        }
            return [];
    }

    /**
     * Update the agreement status
     * @param  integer $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function agreement(int $id)
    {
        return $this->model
            ->find(Credentials::id())
            ->update([
                'agreement' => user_ip(),
            ]);
    }

    /**
     * Get if the client can use the worker module using the user_id
     * @param  integer $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function loadWorkers($id = null)
    {
        return $this->model
            ->find($id)
            ->client
            ->config
            ->pluck('config_key', 'id')
            ->all();
    }
}