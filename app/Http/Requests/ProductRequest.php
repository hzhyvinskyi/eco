<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'description' => 'bail|required|string|min:5|max:3000',
            'price' => 'bail|required|integer|min:99|max:9999999',
            'discount' => 'required|integer|min:0|max:25',
            'stock' => 'required|integer|min:1|max:999'
        ];
    }
}
