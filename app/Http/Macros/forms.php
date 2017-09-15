<?php 

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
    Html::macro('checkbox', function($data, $relationship, $id, $name)
    {
        $checked = in_array($id, $data->{$relationship}->pluck('id')->all()) 
            ? $checked = ' checked="checked"' 
            : $checked = '';
            //Return the checkbox
            return sprintf(
                Html::checkboxContainer(), 
                sprintf(Html::checkboxConstructor($data, $relationship, $id), $id, $checked, $name)
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
    Html::macro('checkboxConstructor', function($data, $relationship, $id)
    {
        return '<input type="checkbox" id="checkbox-' . $relationship . '-' . $id . '" name="' . $relationship . '_id[]" value="%s" class="checkBoxCustom"%s> %s';
    }); 

    /**
     * Helper: checkbox container html5
     * 
     * @return  string
     */
    Html::macro('checkboxContainer', function()
    {
        return '<div class="col-lg-2"><div class="checkbox"><label class="control-label">%s</label></div></div>';
    }); 