<?php 

    /*
    |--------------------------------------------------------------------------
    | Agronomic fields
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a agronomic field for: date
     * @param boolean $required
     * 
     * @return  string
     */
    Form::macro('agronomicQuantity', function($required = true, $class = 'col-md-2')
    {
        return BootForm::text(trans('units.quantity'), 'agronomic_quantity')
            ->addGroupClass($class)
            ->addClass('number')
            ->required($required);
    });

    /**
     * Generate a agronomic field for: date
     * @param boolean $required
     * 
     * @return  string
     */
    Form::macro('agronomicDate', function($required = true, $class = 'col-md-2')
    {
        return BootForm::InputGroup(trans('dates.date:application'), 'agronomic_date')
            ->addGroupClass($class)
            ->addClass('date')
            ->afterAddon(icon('calendar'))
            ->required($required);
    });

    /**
     * Generate a agronomic field for: units
     * @param string $section [The current section]
     * 
     * @return  string
     */
    Form::macro('agronomicUnits', function($section)
    {
        if(!empty($section)) {
            //Field: Plots by role
            return BootForm::select(trans('units.title:mix'), 'agronomic_quantity_unit')
                ->addGroupClass('col-md-2')
                ->options(select_units($section))
                ->required();
        }
    });