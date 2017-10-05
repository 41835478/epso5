<?php

namespace App\DataTables\Workers;

trait DataTableJavascript
{
    /**
     * Custom initComplete
     * @return string
     */    
    public function customInitComplete()
    {
        return "";
        // return "
        //     {$this->addColumnSummatory($column = 1, $icon = icon('euro'))}
        // ";
    }

    /**
     * Custom stateLoadParams
     * @return string
     */    
    public function customStateLoadParams()
    {
        return $this->numericFilter($container = 'search_level', $column = 7);
    }

    /**
     * Custom JqueryCallback
     * @return string
     */    
    public function customJqueryCallback()
    {
        return "";
    }
}