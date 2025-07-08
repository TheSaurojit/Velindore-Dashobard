<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $status = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

    public function updateStatus(Request $request, Order $order)
    {
        $status = $request->input('status');
        if (!in_array($status, $this->status)) {
            return redirect()->back()->with('error', 'Invalid status update.');
        }
        $order->status = $status;
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function allOrder()
    {

        $orders = Order::with(['product', 'product.singleImage'])->latest()->get();

        return view('pages.orders.all-orders', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('pages.orders.view', compact('order'));
    }

    public function updateView(Order $order)
    {
        return view('pages.orders.update', compact('order'));
    }

    public function update(Request $request, Order $order)
    {

        $data = $request->validate([
            'user_email' => 'required|email',
            'user_name' => 'required|string',
            'user_phone' => 'required|string',

            'shipping_street_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_state_province' => 'nullable|string',
            'shipping_postal_code' => 'required|string',
            'shipping_country' => 'required|string', // e.g. IN, US
        ]);

        $order->update($data);
        return redirect()->route('orders.all')->with('success', 'Order updated successfully.');
    }

    public function invoice(Order $order)
    {
        return view('pages.orders.invoice', compact('order'));
    }
}
