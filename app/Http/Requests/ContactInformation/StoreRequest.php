<?php

namespace App\Http\Requests\ContactInformation;

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
        return [
            'shipping_information.name' => 'required',
            'shipping_information.email' => 'required|email',
            'shipping_information.address' => 'required',
            'shipping_information.country' => 'required',
            'shipping_information.zip' => 'required',
            'shipping_information.city' => 'required',
        ];
    }
}
