<?php

namespace App\Console\Commands\MakeRepository;

trait MakeRepositoryConstructorTraits
{
   /**
    * Set the traits to true
    *
    * @return this
    */
   public function traits()
   {
       $this->traits = ['events', 'helpers', 'presenters', 'relationships', 'scopes'];

       return $this;
   }

   /**
    * Get the trait path.
    *
    * @return string
    */
   public function getTrait($fileName)
   {
       return str_contains($file, '.php') ? $file : $file . '.php';
   }
}