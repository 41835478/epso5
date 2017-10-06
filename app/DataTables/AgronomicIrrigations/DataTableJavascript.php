<?php

namespace App\DataTables\AgronomicIrrigations;

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
     * Custom state load params
     * @return string
     */    
    public function customStateLoadParams()
    {
        return "";
    }

    /**
     * Custom  jquery callback
     * @return string
     */    
    public function customJqueryCallback()
    {
        return "";
    }
}