<?php

namespace App\Console\MakeRepository;

trait MakeRepositoryConstructorFiles
{
    /**
         * Get the file path.
         *
         * @return string
         */
        public function getFile($appendix = null)
        {
            switch ($this->create) {

                case 'controller':
                    $file = 'app/Http/Controllers/Dashboard/DummyClassController';
                    break;

                case 'datatable':
                    $file = 'app/DataTables/DummyClass/DataTable';
                    break;

                case 'dataTablesTraits':
                    $file = 'app/DataTables/DummyClass/DataTable' . $appendix;
                    break;

                case 'localization':
                    $file = 'resources/lang/es/sections/DummyTable';
                    break;

                case 'model':
                    $file = 'app/Repositories/DummyClass/DummyModel';
                    break;

                case 'modelTraits':
                    $file = 'app/Repositories/DummyClass/Traits/DummyClass' . $appendix;
                    break;

                case 'migration':
                    $migration_name = date('Y_m_d_His') . '_create_DummyTable_table';
                    $this->migration = $this->filter($migration_name);
                    $file = 'database/migrations/' . $migration_name;
                    break;
            
                case 'repository':
                    $file = 'app/Repositories/DummyClass/DummyClassRepository';
                    break;
            
                case 'html5Traits':
                    $file = 'resources/views/dashboard/DummyTable/' . $appendix;
                    break;
            
                case 'forms:builder':
                    $file = 'resources/views/dashboard/DummyTable/forms/builder.blade';
                    break;

                case 'forms:default':
                    $file = 'resources/views/dashboard/DummyTable/forms/sections/default.blade';
                    break;
            
                case 'forms:search':
                    $file = 'resources/views/dashboard/DummyTable/forms/search.blade';
                    break;
            }

            return $this->filter($file);
        }

        /**
         * Get the stub file.
         *
         * @param $appendix [for example, to generate the traits... See the getFile() method bellow]
         *
         * @return string
         */
        public function getFileName($appendix = null)
        {
            return str_contains($this->getFile($appendix), '.php') ? $this->getFile($appendix) : $this->getFile($appendix) . '.php';
        }
}