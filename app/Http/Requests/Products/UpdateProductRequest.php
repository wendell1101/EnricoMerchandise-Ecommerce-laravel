<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'price' => 'required|numeric|between:0,99999999999.99',
            'description' => 'required|max:255',
            'content' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Product name is required',
            'name.max' => 'Product name should not be greater than 255 characters',
            'price.required' => 'Product price is required',
            'price.numeric' => 'Product price must be a number',
            'description.required' => 'Product description is required',
            'description.max' => 'Product description should not be greater than 255 characters',
            'content.required' => 'Product content is required',
        ];
    }
}
