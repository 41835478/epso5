<?php

namespace App\Console;

use App\Console\MakeRepository\MakeRepositoryActions;
use App\Console\MakeRepository\MakeRepositoryConstructor;
use App\Console\MakeTest\MakeTestActions;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MakeTest extends MakeRepositoryConstructor
{
    use MakeRepositoryActions, MakeTestActions;
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repoTest {repoName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all the tests for a repository';

    /**
     * The path to the command directory classes
     *
     * @var string
     */
    protected $commandPath = 'MakeTest';
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
    protected $html5Traits;
    protected $stub;
    protected $tests;
    
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
        //First create the helper
        $this->createHelper();
        //Next, create a factory model
        $this->createFactory();
        //Next, create all the tests
        $this->createTests();

        //Table header 
        $this->line(' ') . $this->table($this->tableHeaders, $this->tableData) . $this->line(' ') . $this->line(' ');
        $this->line('Your <options=bold>TESTS</> have been created'); 
        $this->line('<options=bold>Thanks for using this command!!!! See you soon!!!</>') . $this->line(' ');
    }
}
