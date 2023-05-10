<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::with([
            'orderItems', 
            'orderItems.order',
            'orderItems.order.customer',
        ])->orderBy('name', 'ASC')->get();

        return (new ProductCollection($products))
                ->additional(['success' => true])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    public function show(Product $product) 
    {
        $product->load(['orderItems', 'orderItems.order', 'orderItems.order.customer']);

        return (new ProductResource($product))
                ->additional(['success' => true])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }
}
