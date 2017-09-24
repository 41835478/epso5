<?php 

/*
|--------------------------------------------------------------------------
| Hidden fields
|--------------------------------------------------------------------------
*/
    Form::macro('hiddenFields', function($arrayWithFields = [], $data = null)
    {
        $items = collect($arrayWithFields)->map(function($item) {
            echo Form::hidden($item, null, ['id' => $item]);
        });
    });

/*
|--------------------------------------------------------------------------
| Selects
|--------------------------------------------------------------------------
*/

    /**
     * Generate a input-group
     * @param object $data
     * @param array $optionsValues
     * @param string $fieldName
     * @param bool $required
     * 
     * @return  string
     */
    Form::macro('imputGroup', function($value = null, $fieldName, $icon, $class = null, $required = true)
    {
        //Default values 
        $required = $required ? 'required="required"' : '';
        $class = $class ? ' ' . $class : '';
        //Html fields
        $input  = sprintf('<input type="text" name="%s" value="%s" id="%s" class="form-control%s"%s>', $fieldName, $value, $fieldName, $class, $required);
        $span   = sprintf('<span class="input-group-addon">%s</span>', $icon);
        //Generate the input-group
        return sprintf('<div class="input-group">%s%s</div>', $input, $span);
    });

    /**
     * Generate a select
     * @param object $data
     * @param array $optionsValues
     * @param string $fieldName
     * @param bool $required
     * 
     * @return  string
     */
    Form::macro('createSelect', function($data, $optionsValues = [], $fieldName, $required = true)
    {
        //Default values
        $options = '';
        $required = $required ? 'required="required"' : '';
        //Create all the options
        foreach($optionsValues as $key => $value) {
            $options .= macro_optionSelected($data->{$fieldName} ?? null, $key, $value);
        }
        //Generate the select
        return sprintf('<select name="%s" id="%s" class="form-control"%s><option></option>%s</select>', $fieldName, $fieldName, $required, $options);
    });

    /**
     * Generate a coustom option selected
     * @param object $databaseValue
     * @param string $value
     * @param string $title
     * 
     * @return  string
     */
    /**
     * Helper: checkbox container html5
     * @return string
     */
    if (!function_exists('macro_optionSelected')) {
        function macro_optionSelected($databaseValue, $value = null, $title = null)
        {
            $selected = ($databaseValue == $value) ? ' selected' : '';
                return sprintf('<option data-title="%s" value="%s"%s>%s</option>', $title, $value, $selected, $title);
        }
    }

/*
|--------------------------------------------------------------------------
| Checkbox
|--------------------------------------------------------------------------
*/
    
    /**
     * Generate a coustom checkbox
     * @param object $data
     * @param string $relationship
     * @param int $id [The checkbox key]
     * @param string $name [The checkbox value]
     * 
     * @return  string
     */
    Form::macro('checkboxWithPivotTable', function($data, $relationship, $id, $name)
    {
        $checked = in_array($id, $data->{$relationship}->pluck('id')->all()) 
            ? $checked = ' checked="checked"' 
            : $checked = '';
            //Return the checkbox
            return sprintf(
                macro_checkboxContainer(), 
                sprintf(macro_checkboxConstructor($data, $relationship, $id), $id, $checked, $name)
            );
    }); 

    /**
     * Helper: checkbox constructor
     * @param object $data
     * @param string $relationship
     * @param int $id [The checkbox key]
     * 
     * @return  string
     */
    if (!function_exists('macro_checkboxConstructor')) {
        function macro_checkboxConstructor($data, $relationship, $id)
        {
            return '<input type="checkbox" id="checkbox-' . $relationship . '-' . $id . '" name="' . $relationship . '_id[]" value="%s" class="checkBoxCustom"%s> %s';
        }
    }

    /**
     * Helper: checkbox container html5
     * @return string
     */
    if (!function_exists('macro_checkboxContainer')) {
        function macro_checkboxContainer()
        {
            return '<div class="col-lg-2"><div class="checkbox"><label class="control-label">%s</label></div></div>';
        }
    }