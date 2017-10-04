<?php

namespace App\DataTables\Machines;

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
     * Custom initComplete
     * @return string
     */    
    public function customStateLoadParams()
    {
        return "";
    }

    /**
     * Custom initComplete
     * @return string
     */    
    public function customJqueryCallback()
    {
        return "";
    }
}