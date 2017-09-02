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
       $this->html5 = ['actions', 'create', 'edit', 'form', 'form_default', 'index', 'search'];

       return $this;
   }
}