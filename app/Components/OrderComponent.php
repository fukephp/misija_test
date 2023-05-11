<?php

namespace App\Components;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
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

    public function update(UpdateRequest $request, Order $order) 
    {
        $orderData = $request->only(['payment_status', 'customer_id']);
        $data = $request->only(['shipping_information', 'order_items']);

        $order->update($orderData);

        // Shipping information
        $order->shippingInformation()->update($data['shipping_information']);

        // Order items
        foreach($data['order_items'] as $orderItemData) 
        {
            $order->orderItems()->update($orderItemData);
        }

        $order->shippingInformation()->update($data['shipping_information']);

        return $order->load(['orderItems', 'orderItems.product', 'customer', 'shippingInformation']);
    }
}
