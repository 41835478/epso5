<?php 

    /*
    |--------------------------------------------------------------------------
    | Forms
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
    Form::macro('imputGroup', function($value = null, $fieldName, $icon, $class = null, $status = 'required')
    {
        //Html fields
        $input  = sprintf('<input type="text" name="%s" value="%s" id="%s" class="form-control%s"%s>', $fieldName, $value, $fieldName, formClass($class), formStatus($status));
        $span   = sprintf('<span class="input-group-addon">%s</span>', $icon);
        //Generate the input-group
        return sprintf('<div class="input-group">%s%s</div>', $input, $span);
    });

    /**
     * Generate a input-group
     * @param string $textareaName
     * @param int $maxLength
     * @param int $rows
     * 
     * @return  string
     */
    Form::macro('autoTextArea', function($textareaName, $maxLength = 250, $rows = 5)
    {
        //Html textarea
        $textarea = BootForm::textarea(trans('base.observations'), $textareaName)
            ->addGroupClass('col-md-12')
            ->rows($rows)
            ->maxlength($maxLength);
        //Generate the complete textarea
        return sprintf('%s<div class="ml-3" id="textareaAlert-%s"></div>', $textarea, $textareaName);
    });

    /**
     * Generate a coustom checkbox
     * @param object $data
     * @param string $relationship
     * @param int $id [The checkbox key]
     * @param string $name [The checkbox value]
     * 
     * @return  string
     */
    Form::macro('checkboxWithPivotTable', function($data = null, $relationship, $id, $name)
    {
        //Default values
        $checked = '';
        //Validate the data
        if(!is_null($data)) {
            if(in_array($id, $data->{$relationship}->pluck('id')->all())) {
                $checked = formStatus($status = 'checked');
            }
        }
            //Return the checkbox
            return sprintf(
                macro_checkboxContainer(), 
                sprintf(macro_checkboxConstructor($data, $relationship, $id), $id, $checked, $name)
            );
    }); 

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a coustom option selected
     * @param object $databaseValue
     * @param string $value
     * @param string $title
     * 
     * @return  string
     */
    if (!function_exists('macro_optionSelected')) {
        function macro_optionSelected($databaseValue, $value = null, $title = null)
        {
            $selected = ($databaseValue == $value) ? formStatus($status = 'selected') : '';
                return sprintf('<option data-title="%s" value="%s"%s>%s</option>', $title, $value, $selected, $title);
        }
    }

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