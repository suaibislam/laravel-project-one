<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        // Validation
        $request->validate([
            'userName' => 'required|string|max:255',
            'userAddress' => 'required|string|max:255',
            'userPhone' => 'required|string|max:20',
            'cartItems' => 'required|array',
            'totalAmount' => 'required|numeric',
        ]);

        // Create the order
        $order = Order::create([
            'name' => $request->userName,
            'address' => $request->userAddress,
            'phone' => $request->userPhone,
            'total_amount' => $request->totalAmount,
            'status' => 'pending',
        ]);

        // Store order items
        foreach ($request->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity'],
            ]);
        }

        // Return order ID for redirect
        return response()->json(['success' => true, 'orderId' => $order->id]);
    }

    public function paymentPage($orderId)
    {
        // Fetch the order details to show on the payment page
        $order = Order::with('items')->findOrFail($orderId);

        return view('payment',  compact('order'));
       
    }




    public function processPayment($orderId)
    {
        // Fetch the order details to show on the payment page
        $order = Order::with('items')->findOrFail($orderId);
        return view('payment.paymentpage', compact('order'));
    }
}
