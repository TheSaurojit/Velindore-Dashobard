<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrder() {

        $orders = Order::with(['product','product.images'])->get();


        return view('pages.orders.all-orders',compact('orders'));
    }
}
