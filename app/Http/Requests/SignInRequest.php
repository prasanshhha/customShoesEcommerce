<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email,'.$this->route()?->user,
            'password'=>'required_unless:_method,PUT|min:7|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'phone_number'=>'required|integer|min_digits:7|max_digits:10|min:0'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password should have atleast one capital letter, lower-case letter, a number and a special character.',
            'phone_number.min_digits' => 'Phone number should have atleast 7 digits.',
            'phone_number.max_digits' => 'Phone number cannot have more than 10 digits.',
        ];
    }
}
