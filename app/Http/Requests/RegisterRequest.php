<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "fullname"  => "required|max:100|unique:users,fullname",
            "email"     => "required|email|unique:users,email",
            "password"  => "required|min:8",
            "address"   => "max:255",
            "phone"     => "max:20",
        ];
    }
}
