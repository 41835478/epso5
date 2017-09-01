<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Only Admins or superior can make a request
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Set the default validation rules that apply to the request.
     *
     * @return array
     */
    private function defaultRules() {
        return [
            'name'          => 'required',
            'email'         => 'required|email',
            'role'          => 'required',
            'client_id'     => 'required:integer',

            //Profile field
            //'stored_file'   => 'sometimes|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=250,max_height=250|max:512',
        ];
    }

    /**
     * Set the password validation rules that apply to the request.
     *
     * @return array
     */
    private function passwordRules() {
        return [
            'password'                  => 'required|alpha_num|between:3,20|confirmed',
            'password_confirmation'     => 'required|alpha_num|between:3,20',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //With password
        if(request('password') || request('password_confirmation')) {
            return array_merge($this->passwordRules(), $this->defaultRules());
        }
        //Without password
        return $this->defaultRules();
    }

    /**
     * Customize form fields for errors
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'client_id'                 => trans('financials.client'),
            'name'                      => trans('persona.name'),
            'email'                     => trans('persona.email'),
            'password'                  => trans('auth.password'),
            'password_confirmation'     => trans('auth.password:confirmation'),
            'role'                      => trans('persona.title'),
            'stored_file'               => trans('persona.image'),
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
