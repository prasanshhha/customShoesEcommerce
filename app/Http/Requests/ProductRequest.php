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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'images' => 'required_unless:_method,PUT|array|min:2|max:4',
            'images.*' => 'required_unless:_method,PUT|mimes:jpg,jpeg,png,bmp|max:5000',
            'stock' => 'required|integer|min:0',
            'price' => 'required|decimal:0,4|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|max:200'
        ];
    }
}
