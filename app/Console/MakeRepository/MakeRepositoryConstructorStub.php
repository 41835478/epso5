<?php

namespace App\Console\Commands\MakeRepository;

trait MakeRepositoryConstructorStub
{
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
     * Get the stub file.
     *
     * @return string
     */
    public function getStub()
    {
        $stub = 'app/Console/Commands/' . $this->commandPath. '/stubs/' . $this->stub . '.stub';

        return (Storage::disk($this->disk)->get($stub)) ?? $this->error("No file found in: " . $file);
    }

    /**
     * Set the stub file
     *
     * @return this
     */
    public function stub($stub)
    {
        $this->stub = $stub;

        return $this;
    }
}