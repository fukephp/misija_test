<?php

namespace Tests;

use App\Models\ContactInformation;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function addProducts(int $count = 1) 
    {
        $products = Product::factory($count)->create([
            'availability' => rand(1, 9999)
        ]);

        return $products;
    }

    public function addCustomerWithSingleOrder() 
    {
        $customer = Customer::factory()->create();

        $product = Product::factory()->create([
            'availability' => rand(1, 9999)
        ]);

        $order = Order::factory()->create([
            'customer_id' => $customer->id,
        ]);

        // Shipping address for order
        ContactInformation::factory()->withOrder($order)->create();
        
        // Order item
        $quantity = rand(1, 25);

        OrderItem::factory()->create([
            'product_id' => $product->id,
            'order_id' => $order->id,
            'quantity' => $quantity,
        ]);
    }

    public function addCustomerWithOrders(int $count = 1) 
    {
        $customer = Customer::factory()->create();

        $orders = Order::factory($count)->create([
            'customer_id' => $customer->id,
        ]);

        foreach($orders as $order) 
        {
            // Shipping address for order
            ContactInformation::factory()->withOrder($order)->create();

            $products = Product::factory(rand(1, 3))->create([
                'availability' => rand(1, 9999)
            ]);
            
            // Order items
            foreach($products as $product) 
            {
                $quantity = rand(1, 25);

                OrderItem::factory()->create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $quantity,
                ]);
            }
        }
    }
}
