<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryConstructorDataTablesTraits
{
   /**
    * Set the traits to true
    *
    * @return this
    */
   public function dataTablesTraits()
   {
       $this->dataTablesTraits = ['columns', 'javascript', 'search'];

       return $this;
   }
}