<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgronomicIrrigationsRequest extends FormRequest
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
            'agronomic_date'            => 'required|date_format:d/m/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/',
            'agronomic_quantity'        => 'required|integer',
            'agronomic_quantity_unit'   => 'required|integer',
            'client_id'                 => 'required|integer',
            'crop_id'                   => 'required|integer',
            'plot_id'                   => 'required|integer',
            'user_id'                   => 'required|integer',
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
            'agronomic_date'            => trans('dates.date:application'),
            'agronomic_quantity'        => trans('units.quantity'),
            'agronomic_quantity_unit'   => trans('units.title:mix'),
            'client_id'                 => trans_title('clients', 'singular'),
            'crop_id'                   => trans_title('crops', 'singular'),
            'plot_id'                   => trans_title('plots', 'singular'),
            'user_id'                   => trans('auth.user'),
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
