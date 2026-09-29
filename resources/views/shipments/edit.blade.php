@extends('layouts.app')

@section('title', 'Edit Shipment')

@section('page-title', 'Edit Shipment')

@section('page-subtitle', 'Update shipment and delivery details')

@section('content')

<div class="shipment-card">

    <form action="{{ route('shipments.update', $shipment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="shipment-form-grid">

            {{-- Shipment No --}}
            <div class="form-group">
                <label for="shipment_no">Shipment No <span>*</span></label>
                <input
                    type="text"
                    id="shipment_no"
                    name="shipment_no"
                    value="{{ old('shipment_no', $shipment->shipment_no) }}"
                    required
                >
                @error('shipment_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Packing No --}}
            <div class="form-group">
                <label for="packing_no">Packing No <span>*</span></label>
                <input
                    type="text"
                    id="packing_no"
                    name="packing_no"
                    value="{{ old('packing_no', $shipment->packing_no) }}"
                    required
                >
                @error('packing_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- SO No --}}
            <div class="form-group">
                <label for="so_no">SO No <span>*</span></label>
                <input
                    type="text"
                    id="so_no"
                    name="so_no"
                    value="{{ old('so_no', $shipment->so_no) }}"
                    required
                >
                @error('so_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Item No --}}
            <div class="form-group">
                <label for="item_no">Item No <span>*</span></label>
                <input
                    type="text"
                    id="item_no"
                    name="item_no"
                    value="{{ old('item_no', $shipment->item_no) }}"
                    required
                >
                @error('item_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Customer --}}
            <div class="form-group">
                <label for="customer_name">Customer Name <span>*</span></label>
                <input
                    type="text"
                    id="customer_name"
                    name="customer_name"
                    value="{{ old('customer_name', $shipment->customer_name) }}"
                    required
                >
                @error('customer_name')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Quantity --}}
            <div class="form-group">
                <label for="shipment_quantity">Shipment Quantity <span>*</span></label>
                <input
                    type="number"
                    id="shipment_quantity"
                    name="shipment_quantity"
                    value="{{ old('shipment_quantity', $shipment->shipment_quantity) }}"
                    min="1"
                    required
                >
                @error('shipment_quantity')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Date --}}
            <div class="form-group">
                <label for="shipment_date">Shipment Date <span>*</span></label>
                <input
                    type="date"
                    id="shipment_date"
                    name="shipment_date"
                    value="{{ old('shipment_date', $shipment->shipment_date?->format('Y-m-d')) }}"
                    required
                >
                @error('shipment_date')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Destination --}}
            <div class="form-group">
                <label for="destination">Destination <span>*</span></label>
                <input
                    type="text"
                    id="destination"
                    name="destination"
                    value="{{ old('destination', $shipment->destination) }}"
                    required
                >
                @error('destination')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Transporter --}}
            <div class="form-group">
                <label for="transporter">Transporter</label>
                <input
                    type="text"
                    id="transporter"
                    name="transporter"
                    value="{{ old('transporter', $shipment->transporter) }}"
                >
                @error('transporter')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Vehicle --}}
            <div class="form-group">
                <label for="tracking_vehicle_no">Tracking / Vehicle No</label>
                <input
                    type="text"
                    id="tracking_vehicle_no"
                    name="tracking_vehicle_no"
                    value="{{ old('tracking_vehicle_no', $shipment->tracking_vehicle_no) }}"
                >
                @error('tracking_vehicle_no')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">Status <span>*</span></label>
                <select id="status" name="status" required>

                    <option value="Ready"
                        {{ old('status', $shipment->status) == 'Ready' ? 'selected' : '' }}>
                        Ready
                    </option>

                    <option value="Shipped"
                        {{ old('status', $shipment->status) == 'Shipped' ? 'selected' : '' }}>
                        Shipped
                    </option>

                    <option value="Delivered"
                        {{ old('status', $shipment->status) == 'Delivered' ? 'selected' : '' }}>
                        Delivered
                    </option>

                    <option value="On Hold"
                        {{ old('status', $shipment->status) == 'On Hold' ? 'selected' : '' }}>
                        On Hold
                    </option>

                    <option value="Cancelled"
                        {{ old('status', $shipment->status) == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>

                @error('status')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            {{-- Remarks --}}
            <div class="form-group full-width">
                <label for="remarks">Remarks</label>

                <textarea
                    id="remarks"
                    name="remarks"
                    rows="4"
                    placeholder="Enter shipment remarks"
                >{{ old('remarks', $shipment->remarks) }}</textarea>

                @error('remarks')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="shipment-form-actions">

            <a href="{{ route('shipments.show', $shipment) }}"
               class="btn btn-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Update Shipment
            </button>

        </div>

    </form>

</div>

<style>
.shipment-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 28px;
}

.shipment-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #1e293b;
}

.form-group label span {
    color: #dc2626;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 11px 13px;
    font-size: 14px;
    color: #1e293b;
    background: #ffffff;
    outline: none;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
}

.form-group textarea {
    resize: vertical;
}

.error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
}

.shipment-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 28px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
}

.btn-primary {
    background: #2563eb;
    color: #ffffff;
}

.btn-secondary {
    background: #f1f5f9;
    color: #334155;
}

@media (max-width: 768px) {
    .shipment-form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full-width {
        grid-column: auto;
    }
}
</style>

@endsection