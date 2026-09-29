@extends('layouts.app')

@section('title', 'Edit Material Receiving')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Material Receiving</h1>
        <p>Update material receiving information.</p>
    </div>

    <a href="{{ route('material-receivings.index') }}" class="btn">
        Back
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Edit Receiving Record</h2>
            <p>Update the details below.</p>
        </div>
    </div>

    <form
        action="{{ route('material-receivings.update', ['material_receiving' => $materialReceiving->id]) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label for="receiving_no">
                    Receiving No <span>*</span>
                </label>

                <input
                    type="text"
                    id="receiving_no"
                    name="receiving_no"
                    value="{{ old('receiving_no', $materialReceiving->receiving_no) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="supplier_name">
                    Supplier Name <span>*</span>
                </label>

                <input
                    type="text"
                    id="supplier_name"
                    name="supplier_name"
                    value="{{ old('supplier_name', $materialReceiving->supplier_name) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="fabric_id">
                    Fabric <span>*</span>
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
                            @selected(
                                old(
                                    'fabric_id',
                                    $materialReceiving->fabric_id
                                ) == $fabric->id
                            )
                        >
                            {{ $fabric->fabric_name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="received_date">
                    Received Date <span>*</span>
                </label>

                <input
                    type="date"
                    id="received_date"
                    name="received_date"
                    value="{{ old(
                        'received_date',
                        $materialReceiving->received_date?->format('Y-m-d')
                    ) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lot_batch_no">
                    Lot / Batch No <span>*</span>
                </label>

                <input
                    type="text"
                    id="lot_batch_no"
                    name="lot_batch_no"
                    value="{{ old('lot_batch_no', $materialReceiving->lot_batch_no) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="received_quantity">
                    Received Quantity <span>*</span>
                </label>

                <input
                    type="number"
                    id="received_quantity"
                    name="received_quantity"
                    step="0.01"
                    min="0.01"
                    value="{{ old('received_quantity', $materialReceiving->received_quantity) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="unit">
                    Unit <span>*</span>
                </label>

                <select
                    id="unit"
                    name="unit"
                    required
                >
                    <option value="Kg"
                        @selected(old('unit', $materialReceiving->unit) === 'Kg')>
                        Kg
                    </option>

                    <option value="Meter"
                        @selected(old('unit', $materialReceiving->unit) === 'Meter')>
                        Meter
                    </option>

                    <option value="Pieces"
                        @selected(old('unit', $materialReceiving->unit) === 'Pieces')>
                        Pieces
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">
                    Status <span>*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >
                    <option value="Received"
                        @selected(old('status', $materialReceiving->status) === 'Received')>
                        Received
                    </option>

                    <option value="Inspected"
                        @selected(old('status', $materialReceiving->status) === 'Inspected')>
                        Inspected
                    </option>

                    <option value="Rejected"
                        @selected(old('status', $materialReceiving->status) === 'Rejected')>
                        Rejected
                    </option>
                </select>
            </div>

            <div class="form-group form-group-full">
                <label for="remarks">
                    Remarks
                </label>

                <textarea
                    id="remarks"
                    name="remarks"
                    rows="4"
                >{{ old('remarks', $materialReceiving->remarks) }}</textarea>
            </div>

        </div>

        <div class="form-actions">

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
                Update Material Receiving
            </button>

        </div>

    </form>

</div>

@endsection