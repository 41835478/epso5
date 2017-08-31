<?php

namespace App\Console;

use App\Console\MakeRepository\MakeRepositoryActions;
use App\Console\MakeRepository\MakeRepositoryConstructor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MakeRepository extends MakeRepositoryConstructor
{
    use MakeRepositoryActions;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {repoName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a full repository structure: models, folders, traits, repository,...';

    /**
     * The path to the command directory classes
     *
     * @var string
     */
    protected $commandPath = 'MakeRepository';
    protected $tableHeaders = ['Action', 'Path/File', 'Status'];

    /**
     * System vars
     *
     * @var string
     */
    protected $action;
    protected $disk;
    protected $modelTraits;
    protected $dataTablesTraits;
    protected $stub;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->disk = 'base';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //First create a model
        $this->createModel();
        //Next, create model traits
        $this->createModelTraits();
        //Next, create a migration
        $this->createMigration();
        //Next, create a controller
        $this->createController();
        //Next, create a repository
        $this->createRepository();
        //Next, create the datatable
        $this->createDataTable();
        //Next, create the datatable traits
        $this->createDataTableTraits();

        //Table header 
        $this->line(' ') . $this->table($this->tableHeaders, $this->tableData) . $this->line(' ') . $this->line(' ');
        $this->line('Dont forget to create the new <options=bold>ROUTE</> for this repository'); 
        $this->line('Go to <fg=green>Database\Migrations</> and search for: <fg=green>' . $this->migration . '</> and add the needed values'); 
        $this->line('Go to <fg=green>Database\Migrations\DatabaseSeeder</> and add the new <options=bold>SEEDER</> for this <options=bold>MIGRATION</>'); 
        $this->line('Refresh the site map with: <fg=blue>composer dump</>'); 
        $this->line('And finally, <options=bold>MIGRATE</> your <options=bold>DB</>: <fg=blue>artisan migrate:refresh --seed</>') . $this->line(' '); 
        $this->line('<options=bold>Thanks for using this command!!!! See you soon!!!</>') . $this->line(' ');
    }
}
