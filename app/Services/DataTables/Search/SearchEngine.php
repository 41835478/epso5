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
         $start = self::parseDate($keyword, $type = 'start');
         $end   = self::parseDate($keyword, $type = 'end');
         //Empty search
         if(is_null($start) && is_null($end)){
            return $query;
         }
         //The query 
         return $query->when($end === 'exact_search', function($query) use($dataBaseField, $start) { 
            //Exact search (when the end date is null and want only the results for this date)
            return self::exactSearch($dataBaseField, $query, $start);
         })->when((!is_null($start) && !is_null($end)), function($query) use($dataBaseField, $start, $end) {
            //Search start and end
            return $query->whereBetween($dataBaseField, [
                self::formatDate($start, $type = 'start'),
                self::formatDate($end, $type = 'end')
             ]);
         })->when((!is_null($start) && is_null($end)), function($query) use($dataBaseField, $start) {
            //Only start >=
            return $query->where($dataBaseField, '>=', self::formatDate($date, $type = 'start'));
         })->when((is_null($start) && !is_null($end)), function($query) use($dataBaseField, $end) {
            //Only end <=
            return $query->where($dataBaseField, '<=', self::formatDate($end, $type = 'end'));
         });
     }

    /*
     |--------------------------------------------------------------------------
     | Validation and Helpers
     |--------------------------------------------------------------------------
     */
    
    /**
    * Validate date
    * @param string $date   
    *       
    * @return string
    */
    private function validateDate($date)
    {
        return strlen($date) ? $date : null;
    }

    /**
    * Parse date
    * @param string $date   
    * @param string $type ['start', 'end']   
    *       
    * @return string
    */
    private function parseDate($date, $type = 'start')
    {
        //Date to array
        $search = explode(',', $date);
        //The data
        return ($type === 'start')
            ? (self::validateDate($search[0] ?? null))
            : (self::validateDate($search[1] ?? null));
    }

    /**
    * Parse date
    * @param string $date   
    * @param string $type ['start', 'end']   
    *       
    * @return string
    */
    private function formatDate($date, $type = 'start')
    {
        return ($type === 'start') 
            ? Carbon::createFromFormat('d/m/Y', $date)->setTime(00, 00, 00)
            : Carbon::createFromFormat('d/m/Y', $date)->setTime(23, 59, 59);
    }

    /**
    * Exact search (when the end date is null)
    * @param string $dataBaseField [whatever.agronomic_date] 
    * @param object $query  
    * @param date $start [Start date]  
    *       
    * @return string
    */
    private function exactSearch($dataBaseField, $query, $start)
    {
        return (is_null($start)) 
            //Start is null
            ? $query 
            //Search only start with exact_search (=)
            : $query->where($dataBaseField, self::formatDate($start, $type = 'start'));
    }
}