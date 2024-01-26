<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomizeRequest extends FormRequest
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
            'custom_img' => 'required|mimes:jpg,jpeg,png|max:5000|nullable',
            'img_position' => 'required|in:top-left,left,bottom-left'
        ];
    }

    public function messages()
    {
        return [
            'custom_img.required' => 'An image is required for customization',
            'img_position.required' => 'Please set position for custom design',
            'custom_img.mimes' => 'Please upload an allowed file type',
            'img_position.in' => 'Invalid image position'
        ];
    }
}
