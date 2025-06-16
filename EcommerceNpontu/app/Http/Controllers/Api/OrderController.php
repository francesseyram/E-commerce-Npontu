<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function getCurrentOrder(): JsonResponse
    {
        $order = Order::with(['items.product'])
            ->where('user_id', 1)
            ->where('status', 'pending')
            ->first();

        if (!$order) {
            return response()->json(['message' => 'No pending order found'], 404);
        }

        return response()->json($order);
    }
}
