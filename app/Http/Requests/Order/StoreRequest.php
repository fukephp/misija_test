<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ContactInformation\StoreRequest as ContactInformationStoreRequest;
use App\Http\Requests\OrderItem\StoreRequest as OrderItemStoreRequest;
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
    public static function rules(): array
    {
        $rules = [
            'customer_id' => 'required|exists:customers,id',
            'payment_status' => 'integer|required|between:0,3',
        ];

        $rules = array_replace_recursive($rules, ContactInformationStoreRequest::rules());

        $rules = array_replace_recursive($rules, OrderItemStoreRequest::rules());

        return $rules;
    }
}
