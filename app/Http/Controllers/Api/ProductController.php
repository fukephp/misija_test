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
        $products = Product::with(['orderItems', 'orderItems.order'])->orderBy('name', 'ASC')->get();

        return (new ProductCollection($products))
                ->additional(['success' => true, 'message' => ''])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    public function show(Product $product) 
    {
        return (new ProductResource($product))
                ->additional(['success' => true, 'message' => 'Movie is created.'])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }
}
