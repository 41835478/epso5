<?php 
/**
 * Available methods: 
    * authorize()
    * isAdmin() 
    * isManager()
    * isUser()
 */

namespace App\Services\Credentials\Traits;

trait Authorize
{
    /**
     * Verify is the user has the role: User
     * @param int $model [The field database model]
     * @return boolean
     */
    private function authorize($model)
    {        
        //Check for god or admin
        if($this->hasAnyRoles(['god', 'admin'])) {
            return true;
        }
        //Check if the user has the same client_id as the database record
        if($this->role('editor')) {
            return ($model->client_id === $this->client()) ? true : false;
        }
        //Check if the user has the same user_id as the database record
        if($this->role('user')) {
            return ($model->id === $this->id()) ? true : false;
        }
    } 

    /**
     * Redirect if not allowed
     * @return boolean
     */
    private function accessError()
    {        
        return redirect()
            ->route('dashboard')
            ->withErrors([__('Your are not authorized to access this section')]);
    } 
}
