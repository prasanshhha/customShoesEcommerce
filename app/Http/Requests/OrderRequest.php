<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'location' => 'required|max:200',
            'contact' => 'required|integer|min_digits:7|max_digits:10|min:0',
            'total' => 'required|decimal:0,4|min:0',
            'status' => 'required|in:ordered,cart,wishlist',
            'payment_status' => 'required|in:pending,complete',
            'payment_method' => 'required|in:cash_on_delivery,esewa'
        ];
    }
}
