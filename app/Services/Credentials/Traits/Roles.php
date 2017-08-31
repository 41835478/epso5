<?php 
/**
 * Available methods: 
    * hasAnyRoles($roles)
    * hasRoles($roles) 
    * role($role)
    * roleName()
    * userRole()
    * maxRole()
 */

namespace App\Services\Credentials\Traits;

trait Roles
{
    /**
     * Verify is the user has any role from a list (with just one is enough)
     * @return boolean
     */
    private function hasAnyRoles($roles) : bool
    {
        //Only arrays are allowed
        if(is_array($roles)) {
            //Verify the roles
            foreach($roles as $role) {
                $table = $this->getTable($role);
                if(in_array($table, $this->tableFields)) {
                    if($this->getRole($role) === true) {
                        return true;
                    }
                }
            }
        }
        return false;
    } 

    /**
     * Verify is the user has a list of roles (all of it)
     * @return boolean
     */
    private function hasRoles($roles)  : bool
    {
        //Only arrays are allowed
        if(is_array($roles)) {
            //Default values
            $flag = 0;
            //Total roles (to verify) needed for validation 
            $totalRoles = count($roles) ?? 0;
            //Verify the roles
            foreach($roles as $role) {
                $table = $this->getTable($role);
                if(in_array($table, $this->tableFields)) {
                    if($this->getRole($role) === true) {
                        $flag++;
                    }
                }
            }
            return ($flag === $totalRoles)
                ? true
                : false;
        }
        return false;
    } 

    /**
     * Verify is the user has this role
     * @return boolean
     */
    private function role($role)  : bool
    {
        //To string
        if(is_array($role) && count($role) == 1) {
            $role = implode(' ', $role);
        }

        //Only strings are allowed
        if(is_string($role)) {
            return ($this->getRole($role) === true)
                ? true 
                : false; 
        }

        return false;
    } 

    /**
     * Get the role higher role name 
     * @param boolean $forRoute [Return role name in english and lowercase]
     * @return string
     */
    private function roleName(bool $forRoute = false)  : string
    {
        foreach($this->tableFields as $table) {
            if($this->user->{$table} === true) {
                $route = str_replace('is_', '', $table);
                $role = ucfirst($route);

                return $forRoute ? $route : __($role);
            }
        }

        return __('No results');
    } 

    /**
     * Get the max role for a $user
     * @param boolean $user [Return max role name in english and lowercase]
     * @return string
     */
    private function userRole($user)  : string
    {
        if(empty($user)) {
            return 'user';
        }

        foreach($this->tableFields as $table) {
            if($user->{$table} === true) {
                return str_replace('is_', '', $table);
            }
        }

        return 'user';
    } 

    /**
     * Get the max role for a $user
     * @param boolean $user [Return max role name in english and lowercase]
     * @return string
     */
    private function maxRole()  : string
    {
        return $this->userRole($this->user);
    }

    /*
    |--------------------------------------------------------------------------
    | Internal method. 
    | Can't be called from the facade
    |--------------------------------------------------------------------------
    */
   
    /**
     * Get the role value from the DB
     * @return string
     */
    private function getRole($role) 
    {
        return $this->user->{$this->getTable($role)};
    }

    /**
     * Get the role table name from the DB
     * @return string
     */
    private function getTable($role) : string
    {
        return 'is_' . $role;
    }
}
