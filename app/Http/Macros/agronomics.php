<?php 

    /*
    |--------------------------------------------------------------------------
    | Agronomic fields
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a agronomic field for: date
     * @param array $pests
     * 
     * @return  string
     */
    Form::macro('agronomicPests', function($pests = null, $class = 'col-md-4')
    {
        return ($pests) 
            ? BootForm::select(trans_title('pests'), 'pest_id')
                ->addGroupClass($class)
                ->options($pests)
                ->required()
            : BootForm::select(trans_title('pests'), 'pest_id')
                ->addGroupClass($class)
                ->disabled();
    });

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
    Form::macro('agronomicDate', function($title = null, $required = true, $class = 'col-md-2')
    {
        return BootForm::InputGroup(is_null($title) ? trans('dates.date:application') :  $title, 'agronomic_date')
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