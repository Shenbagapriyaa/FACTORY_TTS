<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()
            ->paginate(10);

        return view(
            'orders.index',
            compact('orders')
        );
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'so_no' => [
                'required',
                'string',
                'max:100',
                'unique:orders,so_no',
            ],

            'item_no' => [
                'required',
                'string',
                'max:100',
            ],

            'order_date' => [
                'required',
                'date',
            ],

            'customer_name' => [
                'required',
                'string',
                'max:150',
            ],

            'quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'size_ratio' => [
                'nullable',
                'string',
            ],

            'delivery_date' => [
                'required',
                'date',
                'after_or_equal:order_date',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Open',
                    'In Progress',
                    'Completed',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        Order::create($validated);

        return redirect()
            ->route('orders.index')
            ->with(
                'success',
                'Order created successfully.'
            );
    }

    public function show(Order $order)
    {
        return view(
            'orders.show',
            compact('order')
        );
    }

    public function edit(Order $order)
    {
        return view(
            'orders.edit',
            compact('order')
        );
    }

    public function update(
        Request $request,
        Order $order
    ) {
        $validated = $request->validate([
            'so_no' => [
                'required',
                'string',
                'max:100',
                Rule::unique(
                    'orders',
                    'so_no'
                )->ignore($order->id),
            ],

            'item_no' => [
                'required',
                'string',
                'max:100',
            ],

            'order_date' => [
                'required',
                'date',
            ],

            'customer_name' => [
                'required',
                'string',
                'max:150',
            ],

            'quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'unit' => [
                'required',
                'string',
                'max:20',
            ],

            'size_ratio' => [
                'nullable',
                'string',
            ],

            'delivery_date' => [
                'required',
                'date',
                'after_or_equal:order_date',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Open',
                    'In Progress',
                    'Completed',
                    'Cancelled',
                ]),
            ],

            'remarks' => [
                'nullable',
                'string',
            ],
        ]);

        $order->update($validated);

        return redirect()
            ->route('orders.index')
            ->with(
                'success',
                'Order updated successfully.'
            );
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with(
                'success',
                'Order deleted successfully.'
            );
    }
}