@extends('layouts.app')

@section('title', 'Inspection Details')

@section('content')

<div class="page-header">
    <div>
        <h1>Inspection Details</h1>
        <p>View complete inspection information.</p>
    </div>

    <div style="display:flex; gap:10px;">
        <a
            href="{{ route('inspections.edit', ['inspection' => $inspection->id]) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('inspections.index') }}"
            class="btn"
        >
            Back
        </a>
    </div>
</div>

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>{{ $inspection->inspection_no }}</h2>
            <p>Inspection record details</p>
        </div>

        @php
            $statusClass = match($inspection->status) {
                'Accepted' => 'status-accepted',
                'Partially Accepted' => 'status-partially-accepted',
                'Rejected' => 'status-rejected',
                default => 'status-default',
            };
        @endphp

        <span class="status-badge {{ $statusClass }}">
            {{ $inspection->status }}
        </span>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Inspection No</label>
            <input
                type="text"
                value="{{ $inspection->inspection_no }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Inspection Date</label>
            <input
                type="text"
                value="{{ $inspection->inspection_date?->format('d-m-Y') }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>GRN No</label>
            <input
                type="text"
                value="{{ $inspection->grn?->grn_no ?? '—' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Supplier</label>
            <input
                type="text"
                value="{{ $inspection->grn?->supplier_name ?? '—' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Received Quantity</label>
            <input
                type="text"
                value="{{ number_format($inspection->received_quantity, 2) }} {{ $inspection->grn?->unit ?? 'Kg' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Inspected Quantity</label>
            <input
                type="text"
                value="{{ number_format($inspection->inspected_quantity, 2) }} {{ $inspection->grn?->unit ?? 'Kg' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Accepted Quantity</label>
            <input
                type="text"
                value="{{ number_format($inspection->accepted_quantity, 2) }} {{ $inspection->grn?->unit ?? 'Kg' }}"
                readonly
            >
        </div>

        <div class="form-group">
            <label>Rejected Quantity</label>
            <input
                type="text"
                value="{{ number_format($inspection->rejected_quantity, 2) }} {{ $inspection->grn?->unit ?? 'Kg' }}"
                readonly
            >
        </div>

    </div>

</div>

<div class="panel">

    <div class="panel-header">
        <div>
            <h2>Inspection Remarks</h2>
            <p>Defects and additional inspection notes.</p>
        </div>
    </div>

    <div class="form-group">
        <label>Defect Remarks</label>

        <textarea
            rows="4"
            readonly
        >{{ $inspection->defect_remarks ?? 'No defect remarks recorded.' }}</textarea>
    </div>

    <div class="form-group" style="margin-top:20px;">
        <label>Remarks</label>

        <textarea
            rows="4"
            readonly
        >{{ $inspection->remarks ?? 'No additional remarks recorded.' }}</textarea>
    </div>

</div>

@endsection