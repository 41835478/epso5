<?php 

namespace App\Services\DataTables\Javascript;

trait InitComplete {

    /**
     * Return the initComplete behavior function for the  datatables javascript
     * @return string
     */
    protected function initComplete(array $sumatory = [])
    {
        return "function () {
            var value;            
            var table = $.fn.dataTable.tables(true);
            if(table){
                {$this->initCompleteItem($this->searchAttributes())}
                {$this->customInitComplete()}
            }
        }";
    }

    /**
     * Create and individual item for the initComplete() method
     * The method columnSearch() is from DataTables/Search/SearchEngine
     * @return string
     */    
    public function initCompleteItem(array $attributes = [], $init = "")
    {
        foreach($attributes as $attribute) {
            $init .= $this->columnSearch($attribute['type'], $attribute['container'], $attribute['column']);
        }

        return $init;
    }

    /**
     * Do the column summatory
     * @return string
     */
    public function addColumnSummatory($column, $icon = '')
    {
        return "
            //Footer 
            var api = this.api(), data;
            function summatory(column) {
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\€,]/g, '').replace(/[\-,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                return api.column( column ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            }
            //Default (on page load)
            $( api.column( {$column} ).footer() ).html(summatory( {$column} ).toFixed( 2 ) + '{$icon}');
            //On filter
            api.on( 'draw.dt', function () {
                $( api.column( {$column} ).footer() ).html(summatory( {$column} ).toFixed( 2 ) + '{$icon}');
            } );
        ";
    }
}