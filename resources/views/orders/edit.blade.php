@extends('layouts.app')

@section('page-title', 'Edit Order')
@section('page-subtitle', 'Update production order details')

@section('content')

<div class="page-header">

    <div>
        <h2>Edit Order</h2>
        <p>Update the sales order and production order information.</p>
    </div>

    <a
        href="{{ route('orders.index') }}"
        class="btn"
    >
        Back
    </a>

</div>


<div class="form-card">

    <form
        method="POST"
        action="{{ route('orders.update', $order->id) }}"
    >

        @csrf
        @method('PUT')


        <div class="form-grid">


            {{-- SO NO --}}
            <div class="form-group">

                <label for="so_no">
                    SO No
                </label>

                <input
                    type="text"
                    id="so_no"
                    name="so_no"
                    value="{{ old('so_no', $order->so_no) }}"
                    required
                >

                @error('so_no')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- ITEM NO --}}
            <div class="form-group">

                <label for="item_no">
                    Item No
                </label>

                <input
                    type="text"
                    id="item_no"
                    name="item_no"
                    value="{{ old('item_no', $order->item_no) }}"
                    required
                >

                @error('item_no')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- ORDER DATE --}}
            <div class="form-group">

                <label for="order_date">
                    Order Date
                </label>

                <input
                    type="date"
                    id="order_date"
                    name="order_date"
                    value="{{ old('order_date', $order->order_date?->format('Y-m-d')) }}"
                    required
                >

                @error('order_date')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- CUSTOMER --}}
            <div class="form-group">

                <label for="customer_name">
                    Customer / Buyer
                </label>

                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    value="{{ old('customer_name', $order->customer_name) }}"
                    required
                >

                @error('customer_name')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- QUANTITY --}}
            <div class="form-group">

                <label for="quantity">
                    Quantity
                </label>

                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    value="{{ old('quantity', $order->quantity) }}"
                    step="0.01"
                    min="0.01"
                    required
                >

                @error('quantity')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- UNIT --}}
            <div class="form-group">

                <label for="unit">
                    Unit
                </label>

                <select
                    id="unit"
                    name="unit"
                    required
                >

                    <option
                        value="Piece"
                        {{ old('unit', $order->unit) == 'Piece' ? 'selected' : '' }}
                    >
                        Piece
                    </option>

                    <option
                        value="Kg"
                        {{ old('unit', $order->unit) == 'Kg' ? 'selected' : '' }}
                    >
                        Kg
                    </option>

                    <option
                        value="Meter"
                        {{ old('unit', $order->unit) == 'Meter' ? 'selected' : '' }}
                    >
                        Meter
                    </option>

                </select>

                @error('unit')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- SIZE RATIO --}}
            <div class="form-group form-group-full">

                <label for="size_ratio">
                    Size Ratio
                </label>

                <textarea
                    id="size_ratio"
                    name="size_ratio"
                    rows="3"
                    placeholder="Example: S:100, M:150, L:150, XL:100"
                >{{ old('size_ratio', $order->size_ratio) }}</textarea>

                @error('size_ratio')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- DELIVERY DATE --}}
            <div class="form-group">

                <label for="delivery_date">
                    Delivery Date
                </label>

                <input
                    type="date"
                    id="delivery_date"
                    name="delivery_date"
                    value="{{ old('delivery_date', $order->delivery_date?->format('Y-m-d')) }}"
                    required
                >

                @error('delivery_date')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- STATUS --}}
            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >

                    <option
                        value="Open"
                        {{ old('status', $order->status) == 'Open' ? 'selected' : '' }}
                    >
                        Open
                    </option>

                    <option
                        value="In Progress"
                        {{ old('status', $order->status) == 'In Progress' ? 'selected' : '' }}
                    >
                        In Progress
                    </option>

                    <option
                        value="Completed"
                        {{ old('status', $order->status) == 'Completed' ? 'selected' : '' }}
                    >
                        Completed
                    </option>

                    <option
                        value="Cancelled"
                        {{ old('status', $order->status) == 'Cancelled' ? 'selected' : '' }}
                    >
                        Cancelled
                    </option>

                </select>

                @error('status')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            {{-- REMARKS --}}
            <div class="form-group form-group-full">

                <label for="remarks">
                    Remarks
                </label>

                <textarea
                    id="remarks"
                    name="remarks"
                    rows="4"
                    placeholder="Enter remarks if any"
                >{{ old('remarks', $order->remarks) }}</textarea>

                @error('remarks')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror

            </div>


        </div>


        <div class="form-actions">

            <a
                href="{{ route('orders.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Order
            </button>

        </div>

    </form>

</div>

@endsection