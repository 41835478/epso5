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
        $this->create('dataTablesTraits')->stub('repository_datatables_trait')->dataTablesTraits()->generate();
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
        $this->create('modelTraits')->stub('repository_model_trait')->modelTraits()->generate();
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
     * Create the view breadcrumb
     *
     * @return mixed
     */
    public function createViewBreadcrumb()
    {
        $this->create('view:breadcrumb')->stub('repository_breadcrumb')->generate();
    }

    /**
     * Create the view forms
     *
     * @return mixed
     */
    public function createViewForms()
    {
        $this->create('view:form')->stub('repository_form')->generate();
        $this->create('view:form:mandatories')->stub('repository_form_mandatories')->generate();
    }

    /**
     * Create the view search
     *
     * @return mixed
     */
    public function createViewSearch()
    {
        $this->create('view:search')->stub('repository_search')->generate();
    }
}