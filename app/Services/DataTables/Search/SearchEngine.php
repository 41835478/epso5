<?php 

namespace App\Services\DataTables\Search;

trait SearchEngine {

    /**
     * Generate a column search
     * @param   string   $type          [Authorized methods]
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search]  
     * @param  string    $searchType    [Can be 'regular' or 'exact'] [Regular by default]
     * @return object
     */
    public function columnSearch($type, $containerID, $columnNumber, $searchType = 'regular')
    {
        //Define method name
        $method = 'filter' . ucfirst($type);

        //If the $type is in the supported filter list...
        if (in_array($type, $this->filters) && method_exists($this, $method)) {
            return $this->$method($containerID, $columnNumber, $searchType);
        }
    }

}