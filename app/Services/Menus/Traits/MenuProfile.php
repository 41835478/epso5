<?php 
/**
 * Available methods:
    * getProfile()
 */

namespace App\Services\Menus\Traits;

use App\Services\Menus\MenusBuilder as Builder;
use Credentials;

trait MenuProfile {

    /**
     * Generate the profile field
     * @return App\Services\Menus\MenusBuilder;
     */
    public function getProfile()
    {
        return $this->item([
             'title' => icon('new', Credentials::name()),
             'url' => route('dashboard.user.users.edit', Credentials::id()),
             'active' => true,
         ]);
    }
}