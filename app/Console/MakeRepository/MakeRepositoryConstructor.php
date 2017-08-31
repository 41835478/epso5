<?php

namespace App\Console\Commands\MakeRepository;

use App\Console\Commands\MakeRepository\MakeRepositoryConstructorFiles;
use App\Console\Commands\MakeRepository\MakeRepositoryConstructorFilters;
use App\Console\Commands\MakeRepository\MakeRepositoryConstructorStub;
use App\Console\Commands\MakeRepository\MakeRepositoryConstructorTraits;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

abstract class MakeRepositoryConstructor extends Command
{
    use MakeRepositoryConstructorFiles, MakeRepositoryConstructorFilters, MakeRepositoryConstructorStub, MakeRepositoryConstructorTraits;

    protected $migration;
    protected $tableData = [];

    /**
     * Execute the artisan command.
     *
     * @return string
     */
    public function generate()
    {
        if(!$this->traits) {
            $this->upload();
        } else {
            //Define the trait base path
            $path = $this->stub;
            //Create the traits
            foreach($this->traits as $trait) {
                $this->stub($path . '_' . $trait);
                $this->upload(studly_case($trait));
            }
            // Reset the traits
            $this->traits = [];
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
}
