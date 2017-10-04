<?php 

namespace App\Services\DataTables\Search;

trait Filters {

    private $min_chars = 3;

    /**
     * Column search by change (The same that input but for select)
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search]  
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterChange($containerID, $columnNumber)
    {
        return "
            $('#{$containerID}').on('change', function(){
                var value = $('#{$containerID}').val();
                $( table ).DataTable().column( {$columnNumber} ).search( value ? '' + value + '' : '' ).draw();
            });
        ";
    }

    /**
     * Column search by input
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search]  
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterInput($containerID, $columnNumber)
    {
        return "
            $('#{$containerID}').on('keyup', function(){
                if($(this).val().length >= {$this->min_chars} || !$(this).val()) {
                    var value = $('#{$containerID}').val();
                    $( table ).DataTable().column( {$columnNumber} ).search( value ? '' + value + '' : '' ).draw();
                }
            });
        ";
    }

    /**
     * Column search by number
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search]  
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterNumber($containerID, $columnNumber)
    {
        return "
            $('#{$containerID}').on('keyup', function() {
                var val = $.fn.dataTable.util.escapeRegex($('#{$containerID}').val());
                if(!isNaN(val)) {
                    $( table ).DataTable().column( {$columnNumber} ).search( val ? '^' + val + '$' : '', true, false ).draw();
                }
            });
        ";
    }

    /**
     * Column search by select: same as change, but with escapeRegex for the value
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search]  
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterSelect($containerID, $columnNumber)
    {
        return "
            $('#{$containerID}').on('change', function() {
                var val = $.fn.dataTable.util.escapeRegex($('#{$containerID}').val());
                $( table ).DataTable().column( {$columnNumber} ).search( val ? '^' + val + '$' : '', true, false ).draw();
            });
        ";
    }

    /**
     * Column search by date
     *
     * @param   string   $containerID   [The container ID] 
     * @param   int      $columnNumber  [The column number to search] 
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterDate($containerID, $columnNumber)
    {
        return "
            $('#search-button').on( 'click', function() {
                var start = $('#search_dateStart').val();
                var end = $('#search_dateEnd').val();
                if (typeof end === 'undefined') {
                    end = 'exact_search';
                }
                var value = start + ',' + end;
                $(table).DataTable().column({$columnNumber}).search( value ).draw();
            } );
        ";
    }
}