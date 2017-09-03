<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryConstructorFilters
{
    /**
     * Filter the content from the stub file.
     *
     * @return string
     */
    public function filter($file)
    {
        return str_replace(
            ['DummyClass', 'DummyModel', 'DummyTable', 'DummySingular'], 
            [$this->getClassName(), $this->getModelName(), $this->getTableName(), $this->getSingular()], 
            $file
        );
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
        return studly_case($this->getSingular());
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

    /**
     * Generate the singular repoName
     *
     * @return string
     */
    public function getSingular()
    {
        return str_singular($this->argument('repoName'));
    }
}