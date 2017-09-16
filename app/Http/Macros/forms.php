<?php 

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
            $options .= Form::optionSelected($data->{$fieldName} ?? null, $key, $value);
        }
        //Generate the select
        return sprintf('<select name="%s" id="%s" class="form-control"%s><option></option>%s</select>', $fieldName, $fieldName, $required, $options);
    });

    /**
     * Generate a coustom option selected
     * @param object $data
     * @param string $value
     * @param string $title
     * 
     * @return  string
     */
    Form::macro('optionSelected', function($data, $value = null, $title = null)
    {
        $selected = ($data == $value) ? ' selected' : '';
            return sprintf('<option data-title="%s" value="%s"%s>%s</option>', $title, $value, $selected, $title);
    });

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
                Form::checkboxContainer(), 
                sprintf(Form::checkboxConstructor($data, $relationship, $id), $id, $checked, $name)
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
    Form::macro('checkboxConstructor', function($data, $relationship, $id)
    {
        return '<input type="checkbox" id="checkbox-' . $relationship . '-' . $id . '" name="' . $relationship . '_id[]" value="%s" class="checkBoxCustom"%s> %s';
    }); 

    /**
     * Helper: checkbox container html5
     * 
     * @return  string
     */
    Form::macro('checkboxContainer', function()
    {
        return '<div class="col-lg-2"><div class="checkbox"><label class="control-label">%s</label></div></div>';
    }); 