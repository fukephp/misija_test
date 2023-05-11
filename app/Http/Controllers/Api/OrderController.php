<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index() 
    {
        $orders = Order::with(['orderItems'])->orderBy('created_at', 'ASC')->get();

        return (new OrderCollection($orders))
                ->additional(['success' => true])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    public function show(Order $order) 
    {

    }
}
