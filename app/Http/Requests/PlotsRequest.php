<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Credentials;

class PlotsRequest extends FormRequest
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
        //Sections
        $administration = [
            'client_id'         => 'required|integer',
            'crop_id'           => 'required|integer',
            'crop_module'       => 'required',
        ];
        $plot = [
            'plot_name'         => 'required',
            'plot_area'         => 'required',
            'plot_framework'    => 'required|regex:/[0-9]{1}x[0-9]{1}/',
        ];
        //Add filters 
        if(!Credentials::isEditor()) {
            $administration = array_merge(['user_id' => 'required|integer'], $administration);
        }
            return array_merge($administration, $plot);
    }

    /**
     * Customize form fields for errors
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user_id'           => trans_title('users', 'singular'),
            'client_id'         => trans_title('clients', 'singular'),
            'crop_id'           => trans_title('crops', 'singular'),
            'plot_name'         => trans_title('plots', 'singular'),
            'crop_module'       => trans('base.module'),
            'plot_area'         => trans('units.area'),
            'plot_framework'    => sections('plots.framework'),
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
