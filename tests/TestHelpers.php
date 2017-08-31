<?php

namespace Tests;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

trait TestHelpers
{    
    protected $createUser;
    protected $createEditor;
    protected $createAdmin;
    protected $createClient;
    protected $createGod;
    protected $makePassword;
    protected $makeUser;

    public function makePassword()
    {
        if($this->makePassword) {
            return $this->makePassword;
        }
        return $this->makePassword = generate_password();
    }

    public function createUser()
    {
        if($this->createUser) {
            return $this->createUser;
        }
        return $this->createUser = User::find(4);
    }

    public function makeUser(array $attributes = [])
    {
        if($this->makeUser) {
            return $this->makeUser;
        }
        return $this->makeUser = factory(User::class)->make($attributes);
    }

    public function createEditor()
    {
        if($this->createEditor) {
            return $this->createEditor;
        }
        return $this->createEditor = User::find(3);
    }

    public function createAdmin()
    {
        if($this->createAdmin) {
            return $this->createAdmin;
        }
        return $this->createAdmin = User::find(2);
    }

    public function createGod()
    {
        if($this->createGod) {
            return $this->createGod;
        }
        return $this->createGod = User::find(1);
    }

    public function createClient($id = 1)
    {
        return $this->createClient = ($id == 1) ? 'EPSO' : 'D.O. Valencia';
    }
}
