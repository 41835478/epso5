<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CropVarietyTypesRequest extends FormRequest
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
            //'field1'          => 'filter::1',
            //'field2'          => 'filter::2',
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
            //'field1'            => trans_title('crops', 'singular'),
            //'field2'            => trans('base.module'),
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
