<?php

namespace App\Components;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderComponent extends BaseComponent
{
    public function store(StoreRequest $request) 
    {
        $customer = Customer::find(1);

        $data = $request->only(['shippingInformation', 'orderItems']);

        $order = Order::create([
            'customer_id' => $customer->id
        ]);

        // Shipping information
        $shippingInformation = $order->shippingInformation()->create($data['shippingInformation']);

        // Order items

        // foreach($data['orderItems'] as $orderItemData) 
        // {

        // }

        return $order;
    }
}
