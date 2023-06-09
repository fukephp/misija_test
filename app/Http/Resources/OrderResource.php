<?php

namespace App\Http\Resources;

use App\Enums\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'payment_status' => PaymentStatus::from($this->payment_status)->toString(),
            'shipping_information' => ContactInformationResource::make($this->whenLoaded('shippingInformation')),
            'customer' => CustomerResource::make($this->whenLoaded('customer')),
            'order_items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
        ];
    }
}
