<?php

namespace App\Components;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;

class OrderComponent extends BaseComponent
{
    /**
     * @param \App\Http\Requests\Order\StoreRequest $request
     * @return \App\Models\Order $order
     */
    public function store(StoreRequest $request) 
    {
        $orderData = $request->only(['payment_status', 'customer_id']);
        $data = $request->only(['shipping_information', 'order_items']);

        $order = Order::create($orderData);

        // Shipping information
        $order->shippingInformation()->create($data['shipping_information']);

        // Order items
        foreach($data['order_items'] as $orderItemData) 
        {
            $order->orderItems()->create($orderItemData);
        }

        return $order->load(['orderItems', 'orderItems.product', 'customer', 'shippingInformation']);
    }
}
