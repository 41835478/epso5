<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryConstructorModelTraits
{
   /**
    * Set the traits to true
    *
    * @return this
    */
   public function modelTraits()
   {
       $this->modelTraits = ['events', 'helpers', 'presenters', 'relationships', 'scopes'];

       return $this;
   }
}