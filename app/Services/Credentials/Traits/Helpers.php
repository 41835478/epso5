<?php 
/**
 * Available methods: 
    * isGod()
    * isAdmin() 
    * isManager()
    * isUser()
 */

namespace App\Services\Credentials\Traits;

trait Helpers
{
    /**
     * Verify is the user has the role: God
     * @return boolean
     */
    private function isGod()  : bool
    {
        return $this->role('god');
    } 

    /**
     * Verify is the user has the role: Admin
     * @return boolean
     */
    private function isAdmin()  : bool
    {
        return $this->role('admin');
    } 

    /**
     * Verify is the user has the role: Editor
     * @return boolean
     */
    private function isEditor()  : bool
    {
        return $this->role('editor');
    } 

    /**
     * Verify is the user has the role: User
     * @return boolean
     */
    private function isUser()  : bool
    {
        return $this->role('user');
    } 
}
