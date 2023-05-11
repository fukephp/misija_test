<?php

namespace App\Observers;

use App\Models\OrderItem;

class OrderItemObserver
{
    /**
     * Handle the OrderItem "created" event.
     */
    public function created(OrderItem $orderItem): void
    {
        $this->updatePriceAndAvailability($orderItem);
    }

    /**
     * Handle the OrderItem "updated" event.
     */
    public function updated(OrderItem $orderItem): void
    {
        $this->updatePriceAndAvailability($orderItem);
    }

    /**
     * Handle the OrderItem "deleted" event.
     */
    public function deleted(OrderItem $orderItem): void
    {
        //
    }

    /**
     * Handle the OrderItem "restored" event.
     */
    public function restored(OrderItem $orderItem): void
    {
        //
    }

    /**
     * Handle the OrderItem "force deleted" event.
     */
    public function forceDeleted(OrderItem $orderItem): void
    {
        //
    }

    protected function updatePriceAndAvailability(OrderItem $orderItem) 
    {
        $product = $orderItem->product;
        $quantity = $orderItem->quantity;
        // Calculate total product availability and total order item price when order item is created
        // Todo: check if availability total count is negative
        $orderItem->update([
            'price' => $product->calculateTotalPrice($quantity),
        ]);
        $product->update([
            'availability' => $product->availability - $quantity
        ]);
    }
}
