<?php

namespace App\DataTables\AgronomicCulturals;

use Credentials;

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
        //Default value for user
        $column = 4;
        //Values by role
        if(Credentials::isAdmin()) {
            $column = $column + 2;
        } elseif (Credentials::isEditor()) {
            $column = $column + 1;
        }
            return $this->numericFilter($container = 'search_cultural', $column);
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