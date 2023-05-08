<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->id,
            'password'=>'required_unless:_method,PUT|min:7',
            'role'=>'required|in:admin, customer',
            'phone_number'=>'required|integer|min_digits:7|max_digits:10|min:0'
        ];
    }
}
