<?php 
/**
 * Available methods:
    * render()
    * hasAnyRoles(array $roles = [])
    * getRole($role)
    * getAttributes($attributes = [])
 */

namespace App\Services\Menus;

use App\Services\Menus\Traits\Menu;
use App\Services\Menus\Traits\MenuContainer;
use App\Services\Menus\Traits\MenuDropdown;
use App\Services\Menus\Traits\MenuLogout;
use App\Services\Menus\Traits\MenuProfile;
use Credentials;

class MenusBuilder
{
    use Menu, MenuContainer, MenuDropdown, MenuLogout, MenuProfile;

    /**
     * @var private
     */
    protected $allowedAttributes = [
        'active',
        'class',
        'inClientList',
        'role',
        'title',
        'tools',
        'url',
    ];
    private $brand = '';
    private $constructor = [];
    private $navbarClass = 'navbar-inverse bg-inverse';
    private $render = false;

    /**
     * Render the menu
     * @return  string
     */
    public function render() : string
    {
        return $this->htmlBuilder();
    }

    /**
     * Alias for role
     * @return  boolean
     */
    private function hasAnyRoles(array $roles = []) : bool
    {
        if(Credentials::hasAnyRoles($roles)) {
            return true;
        }
        return false;
    }

    /**
     * Filter the role value
     * @return  array
     */
    public function getRole($role) : array
    {
        return is_string($role) 
            ? explode(' ', $role) 
            : $role;
    }

    /**
     * Get all the attribute values
     * @return  array
     */
    public function getAttributes($attributes = []) : array
    {
        //Reset all the variables by default
        foreach($this->allowedAttributes as $variable) {
            ${$variable} = null;
        }
        
        //Set the variables
        foreach ($attributes as $key => $attribute) {
            //If there is a value
            if (!empty($key) && !empty($attribute)) {
                //If has not authorization to get this attribute
                if($key === 'role' && $this->hasAnyRoles($this->getRole($attribute)) === false) {
                    //Reset all the variables by default
                    foreach($this->allowedAttributes as $variable) {
                        ${$variable} = null;
                    }

                    return compact($this->allowedAttributes);
                }
                //If has not authorization to see the tools attribute
                if($key === 'tools' && Credentials::tools() == false) {
                    //Reset all the variables by default
                    foreach($this->allowedAttributes as $variable) {
                        ${$variable} = null;
                    }

                    return compact($this->allowedAttributes);
                }
                //If is an alloweb attribute
                if(in_array($key, $this->allowedAttributes)) {
                    //If has authorization
                    ${$key} = ($attribute === true) 
                        ? $key //In case we use ['active' => true]
                        : $attribute;
                }
            }
        }

        return compact($this->allowedAttributes);
    }
}
