@extends('layouts.app')

@section('title', 'Add Material Receiving')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Material Receiving</h1>
        <p>Record incoming fabric received from a supplier.</p>
    </div>

    <a href="{{ route('material-receivings.index') }}" class="btn">
        ← Back
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Please correct the following:</strong>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Receiving Details</h2>
            <p>Enter the material receiving information.</p>
        </div>
    </div>

    <form
        action="{{ route('material-receivings.store') }}"
        method="POST"
        class="form-grid"
    >

        @csrf

        {{-- Receiving Number --}}
        <div class="form-group">
            <label for="receiving_no">
                Receiving No <span class="required">*</span>
            </label>

            <input
                type="text"
                id="receiving_no"
                name="receiving_no"
                value="{{ old('receiving_no') }}"
                placeholder="Example: MR-001"
                required
            >
        </div>

        {{-- Supplier --}}
        <div class="form-group">
            <label for="supplier_name">
                Supplier Name <span class="required">*</span>
            </label>

            <input
                type="text"
                id="supplier_name"
                name="supplier_name"
                value="{{ old('supplier_name') }}"
                placeholder="Enter supplier name"
                required
            >
        </div>

        {{-- Fabric --}}
        <div class="form-group">
            <label for="fabric_id">
                Fabric <span class="required">*</span>
            </label>

            <select
                id="fabric_id"
                name="fabric_id"
                required
            >
                <option value="">Select Fabric</option>

                @foreach($fabrics as $fabric)
                    <option
                        value="{{ $fabric->id }}"
                        {{ old('fabric_id') == $fabric->id ? 'selected' : '' }}
                    >
                        {{ $fabric->fabric_code }} -
                        {{ $fabric->fabric_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Received Date --}}
        <div class="form-group">
            <label for="received_date">
                Received Date <span class="required">*</span>
            </label>

            <input
                type="date"
                id="received_date"
                name="received_date"
                value="{{ old('received_date', date('Y-m-d')) }}"
                required
            >
        </div>

        {{-- Lot / Batch --}}
        <div class="form-group">
            <label for="lot_batch_no">
                Lot / Batch No <span class="required">*</span>
            </label>

            <input
                type="text"
                id="lot_batch_no"
                name="lot_batch_no"
                value="{{ old('lot_batch_no') }}"
                placeholder="Example: LOT-1001"
                required
            >
        </div>

        {{-- Quantity --}}
        <div class="form-group">
            <label for="received_quantity">
                Received Quantity <span class="required">*</span>
            </label>

            <input
                type="number"
                id="received_quantity"
                name="received_quantity"
                value="{{ old('received_quantity') }}"
                step="0.01"
                min="0.01"
                placeholder="Enter quantity"
                required
            >
        </div>

        {{-- Unit --}}
        <div class="form-group">
            <label for="unit">
                Unit <span class="required">*</span>
            </label>

            <select id="unit" name="unit" required>

                <option value="Kg"
                    {{ old('unit', 'Kg') === 'Kg' ? 'selected' : '' }}>
                    Kg
                </option>

                <option value="Meter"
                    {{ old('unit') === 'Meter' ? 'selected' : '' }}>
                    Meter
                </option>

                <option value="Piece"
                    {{ old('unit') === 'Piece' ? 'selected' : '' }}>
                    Piece
                </option>

            </select>
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label for="status">
                Status <span class="required">*</span>
            </label>

            <select id="status" name="status" required>

                <option value="Received"
                    {{ old('status', 'Received') === 'Received' ? 'selected' : '' }}>
                    Received
                </option>

                <option value="Inspected"
                    {{ old('status') === 'Inspected' ? 'selected' : '' }}>
                    Inspected
                </option>

                <option value="Rejected"
                    {{ old('status') === 'Rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>
        </div>

        {{-- Remarks --}}
        <div class="form-group form-group-full">
            <label for="remarks">
                Remarks
            </label>

            <textarea
                id="remarks"
                name="remarks"
                rows="4"
                placeholder="Enter any additional remarks"
            >{{ old('remarks') }}</textarea>
        </div>

        {{-- Actions --}}
        <div class="form-actions form-group-full">

            <a
                href="{{ route('material-receivings.index') }}"
                class="btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Material Receiving
            </button>

        </div>

    </form>

</div>

@endsection