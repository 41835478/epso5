<?php

namespace App\Console\Commands\MakeRepository;

trait MakeRepositoryConstructorFilters
{
    /**
     * Filter the content from the stub file.
     *
     * @return string
     */
    public function filter($file)
    {
        return str_replace(['DummyClass', 'DummyModel', 'DummyTable'], [$this->getClassName(), $this->getModelName(), $this->getTableName()], $file);
    }

    /**
     * Filter the content from the stub file.
     *
     * @return string
     */
    public function filterStub($file)
    {
        return $this->filter($this->getStub($file));
    }
    
    /**
     * Generate the Class name
     *
     * @return string
     */
    public function getClassName()
    {
        return studly_case($this->argument('repoName'));
    }

    /**
     * Generate the Model name
     *
     * @return string
     */
    public function getModelName()
    {
        return studly_case(str_singular($this->argument('repoName')));
    }

    /**
     * Generate the Table name
     *
     * @return string
     */
    public function getTableName()
    {
        return snake_case($this->argument('repoName'));
    }
}