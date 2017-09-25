<?php

namespace App\Http\Requests;

use App\Repositories\Errors\ErrorsRepository;
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
        $crop = [
            'crop_variety_id'   => 'required|integer',
        ];
        $geolocation = [
            'city_id'           => 'required|integer',
            'geo_x'             => 'required',
            'geo_y'             => 'required',
            'geo_lat'           => 'required|numeric',
            'geo_lng'           => 'required|numeric',
            'geo_bbox'          => 'required',
            'frame_width'       => 'required',
            'frame_height'      => 'required',
            'region_id'         => 'required|integer',
        ];
        $plot = [
            'plot_area'                     => 'required',
            'plot_framework'                => 'required|regex:/[0-9]{1}x[0-9]{1}/',
            'plot_name'                     => 'required',
        ];

        //Role filters 
        if(!Credentials::isEditor()) {
            //If the role is user, always is needed to add the user_id
            //in the other cases are optative...
            $administration = array_merge(['user_id' => 'required|integer'], $administration);
        }

        return array_merge($administration, $crop, $geolocation, $plot);
    }

    /**
     * Customize form fields for errors
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'user_id'                       => trans('auth.user'),
            'city_id'                       => trans('geolocations.city'),
            'client_id'                     => trans_title('clients', 'singular'),
            'crop_id'                       => trans_title('crops', 'singular'),
            'crop_module'                   => trans('base.module'),
            'crop_variety_id'               => sections('crop_varieties.variety'),
            'plot_area'                     => trans('units.area'),
            'plot_name'                     => trans_title('plots', 'singular'),
            'plot_framework'                => sections('plots.framework'),
            'plot_start_date'               => sections('plots.date'),
        ];
    }

    /**
     * Customize response
     *
     * @return array
     */
    public function response(array $errors)
    {
        // If you want to customize what happens on a failed validation,
        // override this method.
        $errorList = collect($errors)->map(function($error) { return $error; })->flatten()->implode('<br>');
        //Add the error to the DB 
        $createError = app(ErrorsRepository::class)->addError('Error de validation. ' . $errorList);
            //Redirect with errors
            return redirect()
                ->route("dashboard.user.plots.index")
                ->withErrors(errorMessageValidation());
    }
}
