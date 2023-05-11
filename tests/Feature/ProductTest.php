<?php

namespace Tests\Feature;

use App\Enums\ApiPrefix;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_list_of_products(): void
    {
        $this->withoutExceptionHandling();

        $this->addProducts(5);

        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/products');

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('data', 5)
                    ->has('success'))
            ->assertStatus(200);
    }

    public function test_single_product(): void
    {
        $this->withoutExceptionHandling();

        $product = Product::factory()->create();
        
        $response = $this->getJson(ApiPrefix::BASE_API_PREFIX() . '/products/' . $product->id);

        $response
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'description',
                    'price',
                    'availability'
                ],
                'success'])
            ->assertStatus(200);
    }
}
