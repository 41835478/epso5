<?php 

namespace App\Services\DataTables\Javascript;

trait StateLoadParams {

    /**
     * Return the stateLoadParams behavior function for the  datatables javascript
     * Restore the old input
     * @return string
     */
    protected function stateLoadParams()
    {
        return "function (settings, data) {
            {$this->stateLoadParamsItem($this->searchAttributes())}
            {$this->customStateLoadParams()}
        }";
    }

    /**
     * When working with numeric values (for example in select), 
     * the output will be '^numeric$' istead of 'numeric'
     * so, we need to clean this value
     * 
     * @return string
     */
    protected function numericFilter($container, $column) 
    {
        //Create the numeric filter
        $filter = "{$container}.replace('^', '').replace('$', '')";
            //Return the value and filter it!!!
            return "var {$container} = data.columns[{$column}].search.search; $('#{$container}').val({$filter});";
    }

    /**
     * Create and individual item for the stateLoadParams() method
     * @return string
     */
    private function stateLoadParamsItem(array $attributes = [], $init = "")
    {
       foreach($attributes as $attribute) {
            $init .= "$('#{$attribute['container']}').val(data.columns[{$attribute['column']}] ? data.columns[{$attribute['column']}].search.search : '');";
       }

       return $init;
    }
}