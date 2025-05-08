<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|unique:product,title,' . $this->id
          
            
        ];
    }
    public function messages()
    {
        return[
            'title.required'=>'Please enter product name',
            'title.unique'=>'Product name already exists',
            'desciption.required'=>'Please enter description',
            'price.required'=>'Please enter price',
            'price.numeric'=>'Please enter number',
        ];
    }
}
