<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'is_active' => '',
            // 'role_id' => 'required|array',
        ];
    }
    public function messages()
    {
        return [
            'email.regex' => 'Invalid email format',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $this->email)) {
                $validator->errors()->add('email', 'Invalid email format');
            }
        });
    }
}
