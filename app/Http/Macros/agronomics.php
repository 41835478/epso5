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
                ->data('combobox', true)
                ->options($pests)
                ->required()
            : BootForm::select(trans_title('pests'), 'pest_id')
                ->addGroupClass($class)
                ->data('combobox', true)
                ->disabled();
    });

    /**
     * Generate a agronomic field for: date
     * @param boolean $required
     * 
     * @return  string
     */
    Form::macro('agronomicQuantity', function($data = null, $required = true, $class = 'col-md-2')
    {
        $status = formStatus($required ? 'required' : null);
        $html = '<div class="form-group %s">' . 
                    '<label class="control-label" for="agronomic_quantity">%s</label>' . 
                    '<input type="text" name="agronomic_quantity" id="agronomic_quantity" class="form-control number" value="%s" %s>' . 
                '</div>';
        return sprintf($html, $class, trans('units.quantity'), $data->agronomic_quantity ?? null, $status);
    });

    /**
     * Generate a agronomic field for: date
     * @param boolean $required
     * 
     * @return  string
     */
    Form::macro('agronomicDate', function($data = null, $title = null, $required = true, $class = 'col-md-2')
    {
        $status = formStatus($required ? 'required' : null);
        $title = is_null($title) ? trans('dates.date:application') :  $title;
        $html = '<div class="form-group %s">' . 
                    '<label class="control-label" for="agronomic_date">%s</label>' . 
                    '<div class="input-group">' . 
                        '<input type="text" name="agronomic_date" id="agronomic_date" class="form-control date" value="%s" %s>' . 
                        '<span class="input-group-addon">%s</span>' . 
                    '</div>' . 
                '</div>';
        return sprintf($html, $class, $title, $data->agronomic_date ?? null, $status, icon('calendar'));
    });

    /**
     * Generate a agronomic field for: units
     * @param string $section [The current section]
     * 
     * @return  string
     */
    Form::macro('agronomicUnits', function($data = null, $section = null, $required = true, $class = 'col-md-2', $options = '')
    {
        if(!empty($section)) {
            foreach(select_units($section) as $key => $value) {
                if(isset($data) && $key === $data->agronomic_quantity_unit) {
                    $options .= '<option value="' . $key . '" selected>' . $value . '</option>';
                } else {
                    $options .= '<option value="' . $key . '">' . $value . '</option>';
                }
            }
            $status = formStatus($required ? 'required' : null);
            $html = '<div class="form-group %s">' .
                        '<label class="control-label" for="agronomic_quantity_unit">%s</label>' . 
                        '<select name="agronomic_quantity_unit" id="agronomic_quantity_unit" class="form-control" %s>' . 
                            '%s' . 
                        '</select>' . 
                    '</div>';
            return sprintf($html, $class, trans('units.title:mix'), $status, $options);
        }
    });

    /**
     * Generate a agronomic field for: Kg/ha of production
     * @param string $data [Only work if we are edit]
     * 
     * @return  string
     */
    Form::macro('agronomicProduction', function($data = null, $title = null, $disabled = true, $class = 'col-md-2')
    {
        if(isset($data->agronomic_quantity_ha)) {
            $status = formStatus($disabled ? 'disabled' : null);
            $html = '<div class="form-group %s">' . 
                        '<label class="control-label mt-4" for="agronomic_quantity_ha"></label>' . 
                        '<div class="input-group">' . 
                            '<input type="text" name="agronomic_quantity_ha" id="agronomic_quantity_ha" class="form-control number" value="%s" %s>' . 
                            '<span class="input-group-addon">%s</span>' . 
                        '</div>' . 
                    '</div>';
            return sprintf($html, $class, $data->agronomic_quantity_ha ?? null, $status, trans('units.kg:ha'));
        }
    });

    /**
     * Generate a agronomic field for: Kg/ha of production
     * @param string $data [Only work if we are edit]
     * 
     * @return  string
     */
    Form::macro('agronomicBaumeKg', function($data = null, $title = null, $disabled = true, $class = 'col-md-2')
    {
        if(isset($data->agronomic_baume)) {
            $status = formStatus($disabled ? 'disabled' : null);
            $html = '<div class="form-group %s">' . 
                        '<label class="control-label mt-4" for="agronomic_baume_kg"></label>' . 
                        '<div class="input-group">' . 
                            '<input type="text" name="agronomic_baume_kg" id="agronomic_baume_kg" class="form-control number" value="%s" %s>' . 
                            '<span class="input-group-addon">%s</span>' . 
                        '</div>' . 
                    '</div>';
            return sprintf($html, $class, $data->agronomic_baume_kg ?? null, $status, trans('agronomics.baume:kg'));
        }
    });