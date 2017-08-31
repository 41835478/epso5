<?php

namespace App\Console\MakeRepository;

use App\Console\MakeRepository\MakeRepositoryConstructorDataTablesTraits;
use App\Console\MakeRepository\MakeRepositoryConstructorFiles;
use App\Console\MakeRepository\MakeRepositoryConstructorFilters;
use App\Console\MakeRepository\MakeRepositoryConstructorModelTraits;
use App\Console\MakeRepository\MakeRepositoryConstructorStub;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

abstract class MakeRepositoryConstructor extends Command
{
    use MakeRepositoryConstructorFiles, MakeRepositoryConstructorFilters, MakeRepositoryConstructorStub, MakeRepositoryConstructorModelTraits, MakeRepositoryConstructorDataTablesTraits;

    protected $migration;
    protected $tableData = [];

    /**
     * Execute the artisan command.
     *
     * @return string
     */
    public function generate()
    {
        if($this->modelTraits) {
            $this->createTrait('modelTraits');
        } elseif($this->dataTablesTraits) {
            $this->createTrait('dataTablesTraits');
        } else {
            $this->upload();
        } 
    }

    /**
     * Upload the file
     *
     * @param $appendix [for example, to generate the traits... See the getFile() method bellow]
     * 
     * @return string
     */
    public function upload($appendix = null)
    {
        if(Storage::disk($this->disk)->put($this->getFileName($appendix), $this->filterStub($this->getStub()))) {
            $this->tableData[] = ['action' => $this->create, 'file' => $this->getFileName($appendix), 'status' => 'Successful'];
        }
    }

    /**
     * Set the create action: model, interface,...
     *
     * @return this
     */
    public function create($create)
    {
        $this->create = $create;
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

    /**
     * Renerate a Trait.
     *
     * @return string
     */
    public function createTrait($trait)
    {
        //Path to the traits
        $path = $this->stub;
        //Create the traits
        foreach($this->{$trait} as $item) {
            $this->stub($path . '_' . $item);
            $this->upload(studly_case($item));
        }
        // Reset the traits
        $this->{$trait} = [];
    }
}
