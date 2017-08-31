<?php 
/**
 * Available methods: 
    * address()
    * avatar()
    * email()
    * id()
    * locale()
    * name()
    * url()
    * client()
 */

namespace App\Services\Credentials\Traits;

trait Users
{
    /**
     * Get the user address
     * @return string
     */
    private function address()
    {
        return $this->user->profile->profile_address ?? null;
    }

    /**
     * Get the user avatar / profile image
     * @return string
     */
    private function avatar()
    {
        return sprintf('<img src="%s" class="thumbnail">', image_path($this->user->profile ?? null));
    }

    /**
     * Get the user email
     * @return string
     */
    private function email()
    {
        return $this->user->email ?? null;
    }

    /**
     * Get the user id
     * @return string
     */
    private function id()
    {
        return $this->user->id ?? null;
    }

    /**
     * Get the user locale language
     * @return string
     */
    private function locale()
    {
        return $this->user->locale ?? null;
    }

    /**
     * Get the user name
     * @return string
     */
    private function name()
    {
        return $this->user->name ?? null;
    }

    /**
     * Get the user website
     * @return string
     */
    private function url()
    {
        return $this->user->profile->profile_url ?? null;
    }

    /**
     * Get the user website
     * @return string
     */
    private function client()
    {
        return $this->user->client_id ?? null;
    }

    /**
     * Get the user website
     * @return string
     */
    private function tools()
    {
        return $this->user->tools ?? null;
    }
}
