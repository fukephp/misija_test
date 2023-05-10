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

        foreach($customers as $customer) 
        {
            $products = Product::factory(rand(5, 20))->create([
                'availability' => rand(1, 9999)
            ]);

            foreach(range(1, rand(10, 25)) as $customerOrder) 
            {
                $order = Order::factory()->create([
                    'customer_id' => $customer->id,
                ]);

                // Shipping address for order
                ContactInformation::factory()->withOrder($order)->create();
                
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
}
