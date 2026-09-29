@extends('layouts.app')

@section('page-title', 'Orders')
@section('page-subtitle', 'Manage production orders')

@section('content')

<div class="page-header">

    <div>
        <h2>Orders</h2>
        <p>Manage sales orders and production order details.</p>
    </div>

    <a
        href="{{ route('orders.create') }}"
        class="btn btn-primary"
    >
        + Add Order
    </a>

</div>


<div class="table-card">

    <table class="data-table">

        <thead>
            <tr>
                <th>SO No</th>
                <th>Item No</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Quantity</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>

            @forelse($orders as $order)

                <tr>

                    <td>
                        <strong>
                            {{ $order->so_no }}
                        </strong>
                    </td>

                    <td>
                        {{ $order->item_no }}
                    </td>

                    <td>
                        {{ $order->customer_name }}
                    </td>

                    <td>
                        {{ $order->order_date?->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $order->quantity }}
                        {{ $order->unit }}
                    </td>

                    <td>
                        {{ $order->delivery_date?->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $order->status }}
                    </td>

                    <td>

                        <a
                            href="{{ route('orders.show', $order->id) }}"
                            class="btn btn-sm"
                        >
                            View
                        </a>

                        <a
                            href="{{ route('orders.edit', $order->id) }}"
                            class="btn btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('orders.destroy', $order->id) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Delete this order?');"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="8"
                        style="text-align:center;"
                    >
                        No orders found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<div style="margin-top:20px;">
    {{ $orders->links() }}
</div>

@endsection