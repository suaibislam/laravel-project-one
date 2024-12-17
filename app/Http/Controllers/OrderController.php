<?php

namespace App\Http\Controllers;

use App\Models\ProductUser;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   

    public function adminOrderList()
    {
        $orders = Order::with('productuser')->get(); // Using Eloquent relationship
        return view('admin.orders', ['orders' => $orders]);
    }

}
