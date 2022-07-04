<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffersRequest extends FormRequest
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
     */
    public function rules()
    {
        return [
            "title"         => "required",
            "description"   => "required",
            "country"       => "required",
            "city"          => "required",
            "location"      => "required",
            "type"          => "required",
            "category"      => "required",
            "details"       => "required",
            "price"         => "required",
            "builtIn"       => "required",
            "garage"        => "required",
            "area"          => "required",
            "agentFees"     => "required",
        ];
    }
}
