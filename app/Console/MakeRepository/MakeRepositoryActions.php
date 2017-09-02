<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryActions
{
    /**
     * Create the controller
     *
     * @return mixed
     */
    public function createController()
    {
        $this->create('controller')->stub('repository_controller')->generate();
    }

    /**
     * Create the datatable
     *
     * @return mixed
     */
    public function createDataTable()
    {
        $this->create('datatable')->stub('repository_datatable')->generate();
    }

    /**
     * Create the datatable traits
     *
     * @return mixed
     */
    public function createDataTableTraits()
    {
        $this->create('dataTablesTraits')->stub('no_need')->dataTablesTraits()->generate();
    }

    /**
     * Create a migration
     *
     * @return mixed
     */
    public function createMigration()
    {
        $this->create('migration')->stub('repository_migration')->generate();
    }

    /**
     * Create a model
     *
     * @return mixed
     */
    public function createModel()
    {
        $this->create('model')->stub('repository_model')->generate();
    }

    /**
     * Create the model traits
     *
     * @return mixed
     */
    public function createModelTraits()
    {
        $this->create('modelTraits')->stub('no_need')->modelTraits()->generate();
    }

    /**
     * Create the repository file
     *
     * @return mixed
     */
    public function createRepository()
    {
        $this->create('repository')->stub('repository')->generate();
    }

    /**
     * Create the language files
     *
     * @return mixed
     */
    public function createLocalization()
    {
        $this->create('localization')->stub('localization')->generate();
    }

    /**
     * Create the view breadcrumb
     *
     * @return mixed
     */
    public function createHtml5Traits()
    {
        $this->create('html5Traits')->stub('no_need')->html5Traits()->generate();
    }
}