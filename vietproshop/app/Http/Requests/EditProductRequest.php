<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            //
            "category_id"=> "required",
            "code"=>[
                "required",
                Rule::unique("products")->ignore($this->id),
            ] ,
            "name"=> "required",
            "price"=> "required",       
            "info"=> "required",
            "describer"=> "required",
    
        ];
    }
    public function messages()
    {
        return [
            //
            "category_id.required"=> "thông tin không được để trống",
            "code.required"=> "thông tin không được để trống",
            "code.unique"=> "ma sp da ton tai",
            "name.required"=> "thông tin không được để trống",
            "price.required"=> "thông tin không được để trống",
            "info.required"=> "thông tin không được để trống",
            "describer.required"=> "thông tin không được để trốngs",
    
        ];
    }
}
