<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shippingInformation.name' => 'required',
            'shippingInformation.email' => 'required|email',
            'shippingInformation.address' => 'required',
            'shippingInformation.country' => 'required',
            'shippingInformation.zip' => 'required',
            'shippingInformation.city' => 'required',
            // 'orderItems.*' => 'array'
        ];
    }
}
