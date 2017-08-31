<?php

namespace App\Repositories\Users\Traits;

use Credentials;

trait UsersHelpers {

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Filter and modify the request input
     * @return  array
     */
    private function operations()
    {
        $request = request()->all();
        //$request['stored_file'] = $this->image->handler();

        return $this->role($request);
    }

    /**
     * Filter the role data
     * @param array $request
     * @return  array
     */
    private function role($request)
    {
        switch ($request['role']) {
            case 'god':
                $request['is_god'] = $request['is_admin'] = $request['is_editor'] = $request['is_user'] = true;
                break;
            case 'admin':
                $request['is_god'] = false;
                $request['is_admin'] = $request['is_editor'] = $request['is_user'] = true;
                break;
            case 'editor':
                $request['is_god'] = $request['is_admin'] = false;
                $request['is_editor'] = $request['is_user'] = true;
                break;
            default:
                $request['is_god'] = $request['is_admin'] = $request['is_editor'] = false;
                $request['is_user'] = true;
        };

        return $request;
    }

    /**
     * Delete users
     * @return  boolean
     */
    private function deleteUsers()
    {
        return $this->inLists(items_list())
            //Respect our own user id...
            ->where('id', '!=', Credentials::id())
            ->delete();
    }

    /**
     * Delete profiles
     * @return  boolean
     */
    private function deleteProfiles()
    {
        return $this->profile
            ->inLists(items_list())
            ->delete();
    }
}