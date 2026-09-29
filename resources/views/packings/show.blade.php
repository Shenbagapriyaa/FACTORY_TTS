@extends('layouts.app')

@section('title', 'Packing Details')

@section('page-title', 'Packing Details')

@section('page-subtitle', 'View packing process information')

@section('content')

<div class="card">

    <div class="packing-details">

        <div class="detail-row">
            <div class="detail-label">Packing No</div>
            <div class="detail-value">{{ $packing->packing_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Finishing No</div>
            <div class="detail-value">{{ $packing->finishing_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Bundle No</div>
            <div class="detail-value">{{ $packing->bundle_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">SO No</div>
            <div class="detail-value">{{ $packing->so_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Item No</div>
            <div class="detail-value">{{ $packing->item_no }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Size</div>
            <div class="detail-value">{{ $packing->size }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Input Quantity</div>
            <div class="detail-value">{{ $packing->input_quantity }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Packed Quantity</div>
            <div class="detail-value">{{ $packing->packed_quantity ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Rejected Quantity</div>
            <div class="detail-value">{{ $packing->rejected_quantity ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Packing Type</div>
            <div class="detail-value">{{ $packing->packing_type }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Operator Name</div>
            <div class="detail-value">{{ $packing->operator_name ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Packing Date</div>
            <div class="detail-value">
                {{ $packing->packing_date?->format('d-m-Y') ?? '-' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status</div>
            <div class="detail-value">{{ $packing->status }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Remarks</div>
            <div class="detail-value">{{ $packing->remarks ?? '-' }}</div>
        </div>

    </div>

    <div class="detail-actions">

        <a href="{{ route('packings.edit', $packing) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('packings.index') }}"
           class="btn">
            Back
        </a>

    </div>

</div>

<style>

    .packing-details {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        overflow: hidden;
    }

    .detail-row {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #d1d5db;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        width: 30%;
        padding: 13px 16px;
        font-weight: 600;
        border-right: 1px solid #d1d5db;
    }

    .detail-value {
        width: 70%;
        padding: 13px 16px;
    }

    .detail-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

</style>

@endsection