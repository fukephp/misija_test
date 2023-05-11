<?php

namespace App\Http\Controllers\Api;

use App\Components\OrderComponent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\ContactInformation;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() 
    {
        $orders = Order::with(['orderItems', 'orderItems.product', 'customer', 'shippingInformation'])->orderBy('created_at', 'ASC')->get();

        return (new OrderCollection($orders))
                ->additional(['success' => true])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    public function show(Order $order) 
    {
        $order->load(['orderItems', 'orderItems.product', 'customer', 'shippingInformation']);

        return (new OrderResource($order))
                ->additional(['success' => true])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param \App\Http\Requests\Order\StoreRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function store(StoreRequest $request) 
    {
        $order = app(OrderComponent::class)->store($request);
        
        if($order)
            return (new OrderResource($order))
                ->additional(['success' => true, 'message' => 'Order is created.'])
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param \App\Http\Requests\Order\UpdateRequest $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function update(UpdateRequest $request, Order $order) 
    {
        $order = app(OrderComponent::class)->update($request, $order);

        if($order)
            return (new OrderResource($order))
                ->additional(['success' => true, 'message' => 'Order is updated.'])
                ->response()
                ->setStatusCode(Response::HTTP_ACCEPTED);

    }
}
