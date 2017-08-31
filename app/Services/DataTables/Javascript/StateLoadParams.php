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
     * Create and individual item for the stateLoadParams() method
     * @return string
     */
    private function stateLoadParamsItem(array $attributes = [], $init = "")
    {
       foreach($attributes as $attribute) {
            $init .= "$('#{$attribute['container']}').val(data.columns[{$attribute['column']}].search.search);";
       }

       return $init;
    }
}