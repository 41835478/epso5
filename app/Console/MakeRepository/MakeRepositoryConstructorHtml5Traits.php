<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryConstructorHtml5Traits
{
   /**
    * Set the traits to true
    *
    * @return this
    */
   public function html5Traits()
   {
       $this->html5Traits = ['create', 'edit', 'index'];

       return $this;
   }
}