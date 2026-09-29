@extends('layouts.app')

@section('page-title', 'Order Details')
@section('page-subtitle', 'View production order information')

@section('content')

<div class="page-header">

    <div>
        <h2>Order Details</h2>
        <p>View complete details of the production order.</p>
    </div>

    <div>

        <a
            href="{{ route('orders.edit', $order->id) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('orders.index') }}"
            class="btn"
        >
            Back
        </a>

    </div>

</div>


<div class="form-card">

    <div class="form-grid">


        {{-- SO NO --}}
        <div class="form-group">

            <label>SO No</label>

            <input
                type="text"
                value="{{ $order->so_no }}"
                readonly
            >

        </div>


        {{-- ITEM NO --}}
        <div class="form-group">

            <label>Item No</label>

            <input
                type="text"
                value="{{ $order->item_no }}"
                readonly
            >

        </div>


        {{-- ORDER DATE --}}
        <div class="form-group">

            <label>Order Date</label>

            <input
                type="text"
                value="{{ $order->order_date?->format('d-m-Y') }}"
                readonly
            >

        </div>


        {{-- CUSTOMER --}}
        <div class="form-group">

            <label>Customer / Buyer</label>

            <input
                type="text"
                value="{{ $order->customer_name }}"
                readonly
            >

        </div>


        {{-- QUANTITY --}}
        <div class="form-group">

            <label>Quantity</label>

            <input
                type="text"
                value="{{ $order->quantity }} {{ $order->unit }}"
                readonly
            >

        </div>


        {{-- DELIVERY DATE --}}
        <div class="form-group">

            <label>Delivery Date</label>

            <input
                type="text"
                value="{{ $order->delivery_date?->format('d-m-Y') }}"
                readonly
            >

        </div>


        {{-- SIZE RATIO --}}
        <div class="form-group form-group-full">

            <label>Size Ratio</label>

            <textarea
                rows="3"
                readonly
            >{{ $order->size_ratio ?? '-' }}</textarea>

        </div>


        {{-- STATUS --}}
        <div class="form-group">

            <label>Status</label>

            <input
                type="text"
                value="{{ $order->status }}"
                readonly
            >

        </div>


        {{-- REMARKS --}}
        <div class="form-group form-group-full">

            <label>Remarks</label>

            <textarea
                rows="4"
                readonly
            >{{ $order->remarks ?? '-' }}</textarea>

        </div>


    </div>


    <div class="form-actions">

        <a
            href="{{ route('orders.index') }}"
            class="btn"
        >
            Back to Orders
        </a>

        <a
            href="{{ route('orders.edit', $order->id) }}"
            class="btn btn-primary"
        >
            Edit Order
        </a>

    </div>

</div>

@endsection