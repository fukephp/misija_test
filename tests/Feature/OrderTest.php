<?php

namespace Tests\Feature;

use App\Enums\ApiPrefix;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_list_of_orders(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/orders');

        $response->assertStatus(200);
    }

    public function test_single_order(): void
    {
        $this->withoutExceptionHandling();

        $order = Order::factory()->create();
        
        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/orders/' . $order->id);

        $response->assertStatus(200);
    }
}
