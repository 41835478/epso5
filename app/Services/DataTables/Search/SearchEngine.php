<?php 

namespace App\Services\DataTables\Search;

use Carbon\Carbon;

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

    /*
     |--------------------------------------------------------------------------
     | Filter by date
     |--------------------------------------------------------------------------
     */
    
     /**
      * Generate a column search
      *
      * @param   object   $query         
      * @param   string   $keyword           [Search dates]  
      * @param   string   $dataBaseField     [Database field name]  
      *
      * @return html
      */
     public function filterByDate($query, $keyword, $dataBaseField = 'agronomic_date')
     {
         //Filter value 
         $search = explode(',', $keyword);
         $start  = isset($search[0]) ? $this->validateDate($search[0]) : null;
         $end    = isset($search[1]) ? $this->validateDate($search[1]) : null;
         //Empty search
         if(is_null($start) && is_null($end)){
             return $query;
         }
         //Exact date 
         if($end === 'exact_search') {
             //Filter empty...
             if(is_null($start)) {
                 return $query;
             }
             return $query
                ->where($dataBaseField, '=', Carbon::createFromFormat('d/m/Y', $start)
                ->setTime(00, 00, 00));
         }
         //Start and end
         if(!is_null($start) && !is_null($end)){
             $query->whereBetween($dataBaseField, [
                 Carbon::createFromFormat('d/m/Y', $start)->setTime(00, 00, 00),
                 Carbon::createFromFormat('d/m/Y', $end)->setTime(23, 59, 59)
             ]);
         }
         //Only start
         if(!is_null($start) && is_null($end)){
             $query->where($dataBaseField, '>=', Carbon::createFromFormat('d/m/Y', $start)->setTime(00, 00, 00));
         }
         //Only end
         if(is_null($start) && !is_null($end)){
             $query->where($dataBaseField, '<=', Carbon::createFromFormat('d/m/Y', $end)->setTime(00, 00, 00));
         }
         //Return query
         return $query;
     }

    /*
     |--------------------------------------------------------------------------
     | Validation and Helpers
     |--------------------------------------------------------------------------
     */
    
     private function validateDate($date)
     {
         return strlen($date) ? $date : null;
     }
}