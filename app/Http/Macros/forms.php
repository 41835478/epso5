<?php 

/*
|--------------------------------------------------------------------------
| Selects
|--------------------------------------------------------------------------
*/
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