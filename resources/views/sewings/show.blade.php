@extends('layouts.app')

@section('page-title', 'Sewing Production Details')
@section('page-subtitle', 'View sewing production information')

@section('content')

<div class="page-header">

    <div>
        <h2>Sewing Production Details</h2>
        <p>Bundle-wise sewing production record.</p>
    </div>

    <div>

        <a href="{{ route('sewings.edit', $sewing) }}"
           class="btn btn-primary">
            Edit
        </a>

        <a href="{{ route('sewings.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>

    </div>

</div>

<div class="details-card">

    <div class="details-row">
        <strong>Sewing No</strong>
        <span>{{ $sewing->sewing_no }}</span>
    </div>

    <div class="details-row">
        <strong>Bundle No</strong>
        <span>{{ $sewing->bundle_no }}</span>
    </div>

    <div class="details-row">
        <strong>Cutting No</strong>
        <span>{{ $sewing->cutting_no }}</span>
    </div>

    <div class="details-row">
        <strong>SO No</strong>
        <span>{{ $sewing->so_no }}</span>
    </div>

    <div class="details-row">
        <strong>Item No</strong>
        <span>{{ $sewing->item_no }}</span>
    </div>

    <div class="details-row">
        <strong>Size</strong>
        <span>{{ $sewing->size }}</span>
    </div>

    <div class="details-row">
        <strong>Bundle Quantity</strong>
        <span>{{ $sewing->bundle_quantity }}</span>
    </div>

    <div class="details-row">
        <strong>Input Quantity</strong>
        <span>{{ $sewing->input_quantity ?? '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Output Quantity</strong>
        <span>{{ $sewing->output_quantity ?? '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Rejected Quantity</strong>
        <span>{{ $sewing->rejected_quantity ?? '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Line No</strong>
        <span>{{ $sewing->line_no ?: '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Operator Name</strong>
        <span>{{ $sewing->operator_name ?: '-' }}</span>
    </div>

    <div class="details-row">
        <strong>Production Stage</strong>
        <span>{{ $sewing->production_stage }}</span>
    </div>

    <div class="details-row">
        <strong>Sewing Date</strong>
        <span>{{ $sewing->sewing_date?->format('d-m-Y') }}</span>
    </div>

    <div class="details-row">
        <strong>Status</strong>
        <span>{{ $sewing->status }}</span>
    </div>

    <div class="details-row">
        <strong>Remarks</strong>
        <span>{{ $sewing->remarks ?: '-' }}</span>
    </div>

</div>

@endsection