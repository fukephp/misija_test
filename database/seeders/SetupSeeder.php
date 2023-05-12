<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::factory(10)->create();

        $products = Product::factory(100)->create([
            'availability' => rand(1, 9999)
        ]);

        foreach($customers as $customer) 
        {
            ContactInformation::factory()->withCustomer($customer)->create();

            $orders = Order::factory(rand(10, 20))->create([
                'customer_id' => $customer->id,
            ]);

            foreach($orders as $order) 
            {
                // Shipping address for order
                ContactInformation::factory()->withOrder($order)->create();
                
                // Order items
                foreach($products->random(rand(2, 10)) as $product) 
                {
                    $quantity = rand(1, 25);

                    OrderItem::factory()->create([
                        'product_id' => $product->id,
                        'order_id' => $order->id,
                        'quantity' => $quantity,
                        'price' => $product->price * $quantity
                    ]);
                }
            }
        }
    }
}
