<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
          
            
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Please enter your name',
            'name.unique'=>'Your name already exists',
            'email.required'=>'Please enter your email',
            'email.unique'=>'Your email already exists',

        ];
    }
}
