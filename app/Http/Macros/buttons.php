<?php 

/*
|--------------------------------------------------------------------------
| Buttons
|--------------------------------------------------------------------------
*/

    /**
     * Agreement button
     * 
     * @return  string
     */
    Form::macro('agreementButton', function()
    {
        return Form::button($text = icon('success', trans('buttons.accepted')), [
            'class' => 'btn btn-success btn-lg',
            'name'  => 'button-agreement-submit',
            'id'    => 'button-agreement-submit',
            'type'  => 'submit',
        ]);
    });

    /**
     * Create button
     * 
     * @return  string
     */
    Form::macro('createButton', function()
    {
        return Form::button($text = icon('new', trans('buttons.new')), [
            'class' => 'btn btn-success btn-lg',
            'name'  => 'button-create-submit',
            'id'    => 'button-create-submit',
            'type'  => 'submit',
        ]);
    });

    /**
     * Edit button
     * 
     * @return  string
     */
    Form::macro('editButton', function()
    {
        return Form::button($text = icon('edit', trans('buttons.edit')), [
            'class' => 'btn btn-success btn-lg',
            'name'  => 'button-edit-submit',
            'id'    => 'button-edit-submit',
            'type'  => 'submit',
        ]);
    });

    /**
     * Edit button
     * @param array $attributes ['url' => urlValue, 'modal' => true or false]
     * @return  string
     */
    Form::macro('cancelButton', function(array $attributes = [])
    {
        //Attributes
        $url     = $attributes['url'] ?? url()->previous();
        $modal   = empty($attributes['modal']) ? '' : ' data-dismiss="modal"';
        //Values
        $size    = empty($attributes['modal']) ? ' btn-lg' : '';
        $class   = 'btn btn-danger';
        $text    = icon('cancel', trans('buttons.cancel'));
            return sprintf('<a href="%s" class="%s%s" id="button-cancel-submit"%s>%s</a>', $url, $class, $size, $modal, $text);
    });