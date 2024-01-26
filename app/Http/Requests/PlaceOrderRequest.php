<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'address' => 'required|max:200',
            'city' => 'required|max:200',
            'contact' => 'required|integer|min_digits:7|max_digits:10|min:0',
            'payment_method' => 'required|in:cash_on_delivery,card'
        ];
    }
}
