@extends('layouts.app')

@section('title', 'Shipment Details')

@section('page-title', 'Shipment Details')

@section('page-subtitle', 'View complete shipment information')

@section('content')

<div class="shipment-card">

    <div class="shipment-details">

        <div class="detail-row">
            <div class="detail-label">Shipment No</div>
            <div class="detail-value">{{ $shipment->shipment_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Packing No</div>
            <div class="detail-value">{{ $shipment->packing_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">SO No</div>
            <div class="detail-value">{{ $shipment->so_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Item No</div>
            <div class="detail-value">{{ $shipment->item_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Customer Name</div>
            <div class="detail-value">{{ $shipment->customer_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Shipment Quantity</div>
            <div class="detail-value">{{ $shipment->shipment_quantity }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Shipment Date</div>
            <div class="detail-value">
                {{ $shipment->shipment_date?->format('d-m-Y') ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Destination</div>
            <div class="detail-value">{{ $shipment->destination }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Transporter</div>
            <div class="detail-value">{{ $shipment->transporter ?: '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tracking / Vehicle No</div>
            <div class="detail-value">
                {{ $shipment->tracking_vehicle_no ?: '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status</div>
            <div class="detail-value">
                <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $shipment->status)) }}">
                    {{ $shipment->status }}
                </span>
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Remarks</div>
            <div class="detail-value">
                {{ $shipment->remarks ?: '-' }}
            </div>
        </div>

    </div>

    <div class="shipment-actions">

        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">
            Back
        </a>

        <a href="{{ route('shipments.edit', $shipment) }}" class="btn btn-primary">
            Edit Shipment
        </a>

    </div>

</div>

<style>
.shipment-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 28px;
}

.shipment-details {
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.detail-row {
    display: grid;
    grid-template-columns: 230px 1fr;
    min-height: 48px;
    border-bottom: 1px solid #e2e8f0;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    background: #f8fafc;
    padding: 14px 16px;
    font-weight: 600;
    color: #334155;
    border-right: 1px solid #e2e8f0;
}

.detail-value {
    padding: 14px 16px;
    color: #475569;
    word-break: break-word;
}

.status-badge {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    background: #eff6ff;
    color: #2563eb;
}

.status-shipped {
    background: #fef3c7;
    color: #92400e;
}

.status-delivered {
    background: #dcfce7;
    color: #166534;
}

.status-on-hold {
    background: #fef3c7;
    color: #92400e;
}

.status-cancelled {
    background: #fee2e2;
    color: #991b1b;
}

.shipment-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 24px;
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
    .detail-row {
        grid-template-columns: 1fr;
    }

    .detail-label {
        border-right: none;
        border-bottom: 1px solid #e2e8f0;
    }
}
</style>

@endsection