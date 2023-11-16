<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'This field is required',
            'name.string'=>'Name must be string',
            'email.required'=>'This field must be string',
            'email.string'=>'Email field must be string',
            'email.email'=>'Email field must example@mail.com format',
            'email.unique'=>'This email already exists',
        ];
    }
}
