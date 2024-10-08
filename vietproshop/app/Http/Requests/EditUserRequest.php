<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            "fullname"=>"required",
            "email"=>[
                "required",
                Rule::unique("users")->ignore($this->id),
            ],
            "password"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "level"=>"required",
        ];
    }

    public function messages()
    {
        return[
            "fullname.required"=>"thông tin không được để trống",
            "email.required"=>"thông tin không được để trống",
            "email.unique"=>"Email đã tồn tại",
            "password.required"=>"thông tin không được để trống",
            "phone.required"=>"thông tin không được để trống",
            "address.required"=>"thông tin không được để trống",
            "level.required"=>"thông tin không được để trống",
        ];
    }
}
