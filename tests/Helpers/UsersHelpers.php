<?php 

namespace Tests\Helpers;

use App\Repositories\Users\User;

trait UsersHelpers
{    
    /**
     * @var protected
     */
    protected $createUser;
    protected $createEditor;
    protected $createAdmin;
    protected $createGod;
    protected $makeUser;

    /**
     * Creating an user
     *
     * @return object
     */
    public function createUser() : User
    {
        if($this->createUser) {
            return $this->createUser;
        }
        return $this->createUser = User::find(4);
    }

    /**
     * Making an user
     *
     * @param  string $attributes
     *
     * @return object
     */
    public function makeUser(array $attributes = [])
    {
        if($this->makeUser) {
            return $this->makeUser;
        }
        return $this->makeUser = factory(User::class)->make($attributes);
    }

    /**
     * Creating an editor
     *
     * @return object
     */
    public function createEditor()
    {
        if($this->createEditor) {
            return $this->createEditor;
        }
        return $this->createEditor = User::find(3);
    }

    /**
     * Creating an Admin
     *
     * @return object
     */
    public function createAdmin()
    {
        if($this->createAdmin) {
            return $this->createAdmin;
        }
        return $this->createAdmin = User::find(2);
    }

    /**
     * Creating an God
     *
     * @return object
     */
    public function createGod()
    {
        if($this->createGod) {
            return $this->createGod;
        }
        return $this->createGod = User::find(1);
    }
}