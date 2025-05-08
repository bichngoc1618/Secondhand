<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required:product',
            'describe' => 'required:product',
            'price' => 'required|numeric',
          
            
        ];
    }
    public function messages()
    {
        return[
            'title.required'=>'Please enter product name',
            'describe.required'=>'Please enter describe',
            'price.required'=>'Please enter price',
            'price.numeric'=>'Please enter number',
        ];
    }
}
