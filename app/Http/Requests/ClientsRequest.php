<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * 'date'   => 'required|date_format:d/m/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/',
     * 'email'  => 'required|email|unique:users,email',
     */
    public function rules()
    {
        
        return [
            'client_name'           => 'required',
            'client_email'          => 'required|email',
            'client_contact'        => 'required',
            'crop_id'               => 'checkboxUnique',
        ];
    }

    /**
     * Customize form fields for errors
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'client_name'           => trans('sections.clients.title'),
            'client_address'        => trans('persona.address'),
            'client_nif'            => trans('persona.id.nif'),
            'client_zip'            => trans('persona.zip'),
            'client_contact'        => trans('persona.contact'),
            'client_email'          => trans('persona.email'),
            'client_city'           => trans('persona.city'),
            'client_state'          => trans('persona.state'),
            'client_country'        => trans('persona.country'),
            'crop_id'               => sections('crops.title'),
        ];
    }

    /**
     * Customize response
     *
     * @return array
     */
    // public function response(array $errors)
    // {
    //     // If you want to customize what happens on a failed validation,
    //     // override this method.
    //     $errors[] = "Se ha producido un error al añadir su parcela. Los campos anteriormente nombrados, se encontraban vacios.";
    //     return redirect()->route("dashboard.users.plots.geolocate")->withErrors($errors);
    // }
}
