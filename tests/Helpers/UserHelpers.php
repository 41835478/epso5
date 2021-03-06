<?php 

namespace Tests\Helpers;

use App\Repositories\Users\User;

trait UserHelpers
{    
    /**
     * @var protected
     */
    protected $createUser;
    protected $createUserAgreement;
    protected $createUserBase;
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
        return $this->createUser = User::orderBy('id', 'desc')->first();
    }

    /**
     * Creating an user
     *
     * @return object
     */
    public function createUserBase() : User
    {
        if($this->createUserBase) {
            return $this->createUserBase;
        }
        return $this->createUserBase = User::find(4);
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
     * Making an user
     *
     * @param  string $attributes
     *
     * @return object
     */
    public function createUserAgreement()
    {
        if($this->createUserAgreement) {
            return $this->createUserAgreement;
        }
        return $this->createUserAgreement = factory(User::class)->create([
            'agreement' => null,
        ]);
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