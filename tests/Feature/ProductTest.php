<?php

namespace Tests\Feature;

use App\Enums\ApiPrefix;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_list_of_products(): void
    {
        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/products');

        $response->assertStatus(200);
    }

    public function test_single_product(): void
    {
        $product = Product::factory()->create();
        
        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/products/' . $product->id);

        $response->assertStatus(200);
    }
}
