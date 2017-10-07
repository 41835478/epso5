<?php 

    /*
    |--------------------------------------------------------------------------
    | Selects
    |--------------------------------------------------------------------------
    */

    /**
     * Generate a select for: plots by role
     * @param array $plots [List of clients]
     * 
     * @return  string
     */
    Form::macro('plots', function($plots = null)
    {
        if(!empty($plots)) {
            //Field: Plots by role
            return BootForm::select(trans_title('plots'), 'plot_id')
                ->addGroupClass('col-md-3')
                ->options(setOptions($plots));
        }
        //Field: Plots disabled
        return BootForm::select(trans_title('plots'), 'plot_id')
            ->addGroupClass('col-md-3')
            ->disabled();
    });

    /**
     * Generate a select for: client and users
     * @param array $clients [List of clients]
     * @param array $users [List of clients]
     * @param bool $loadModule [Load the crop modules on change]
     * 
     * @return  string
     */
    Form::macro('clientsAndUsers', function($clients = null, $users = null, $loadModule = false, $html = '')
    {
        //Create clients
        if($clients) {
            $html = BootForm::select(sections('clients.title'), 'client_id')
                ->addGroupClass('col-md-4')
                ->options(setOptions($clients ?? []))
                ->select(0)
                ->data('module', $loadModule)
                ->required();
        }
        //Create users
        $html .= BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options(setOptions($users ?? []));
        //Get the values
        return $html;
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
    Form::macro('createSelect', function($data, $optionsValues = [], $fieldName, $status = 'required')
    {
        //Default values
        $options = '';
        //Create all the options
        foreach($optionsValues as $key => $value) {
            $options .= macro_optionSelected($data->{$fieldName} ?? null, $key, $value);
        }
        //Generate the select
        return sprintf('<select name="%s" id="%s" class="form-control"%s><option></option>%s</select>', $fieldName, $fieldName, formStatus($status), $options);
    });
    