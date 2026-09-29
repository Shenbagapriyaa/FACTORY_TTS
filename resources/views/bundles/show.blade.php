@extends('layouts.app')

@section('page-title', 'Bundle Details')
@section('page-subtitle', 'View bundle and QR tracking information')

@section('content')

<div class="page-header">

    <div>
        <h2>Bundle Details</h2>
        <p>Bundle information and tracking details.</p>
    </div>

    <div>

        <a href="{{ route('bundles.edit', $bundle) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('bundles.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>

    </div>

</div>

<div class="details-card">

    <div class="details-row">
        <strong>Bundle No</strong>
        <span>{{ $bundle->bundle_no }}</span>
    </div>

    <div class="details-row">
        <strong>QR Code</strong>
        <span>{{ $bundle->qr_code }}</span>
    </div>

    <div class="details-row">
        <strong>Cutting No</strong>
        <span>{{ $bundle->cutting_no }}</span>
    </div>

    <div class="details-row">
        <strong>Marker No</strong>
        <span>{{ $bundle->marker_no }}</span>
    </div>

    <div class="details-row">
        <strong>SO No</strong>
        <span>{{ $bundle->so_no }}</span>
    </div>

    <div class="details-row">
        <strong>Item No</strong>
        <span>{{ $bundle->item_no }}</span>
    </div>

    <div class="details-row">
        <strong>Size</strong>
        <span>{{ $bundle->size }}</span>
    </div>

    <div class="details-row">
        <strong>Bundle Quantity</strong>
        <span>{{ $bundle->bundle_quantity }}</span>
    </div>

    <div class="details-row">
        <strong>Bundle Date</strong>
        <span>{{ $bundle->bundle_date?->format('d-m-Y') }}</span>
    </div>

    <div class="details-row">
        <strong>Bundle Operator</strong>
        <span>{{ $bundle->bundle_operator ?: '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Status</strong>
        <span>{{ $bundle->status }}</span>
    </div>

    <div class="details-row">
        <strong>Remarks</strong>
        <span>{{ $bundle->remarks ?: '-' }}</span>
    </div>

</div>

@endsection