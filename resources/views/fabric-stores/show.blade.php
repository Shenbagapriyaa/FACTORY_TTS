@extends('layouts.app')

@section('page-title', 'Fabric Store Details')
@section('page-subtitle', 'View fabric store information')

@section('content')

<div class="form-card">

    <div class="page-header">
        <div>
            <h2>{{ $fabricStore->store_no }}</h2>
            <p>Fabric store record details</p>
        </div>

        <div>
            <a href="{{ route('fabric-stores.edit', $fabricStore->id) }}"
               class="btn btn-primary">
                Edit
            </a>

            <a href="{{ route('fabric-stores.index') }}"
               class="btn">
                Back
            </a>
        </div>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Store No</label>
            <input type="text" value="{{ $fabricStore->store_no }}" readonly>
        </div>

        <div class="form-group">
            <label>Store Date</label>
            <input type="text"
                   value="{{ $fabricStore->store_date?->format('d-m-Y') }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>GRN No</label>
            <input type="text"
                   value="{{ $fabricStore->grn->grn_no ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Supplier</label>
            <input type="text"
                   value="{{ $fabricStore->grn->supplier_name ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Fabric</label>
            <input type="text"
                   value="{{ $fabricStore->fabric->name ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Quantity Received</label>
            <input type="text"
                   value="{{ $fabricStore->quantity_received }} {{ $fabricStore->unit }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Quantity Available</label>
            <input type="text"
                   value="{{ $fabricStore->quantity_available }} {{ $fabricStore->unit }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text"
                   value="{{ $fabricStore->location ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Rack No</label>
            <input type="text"
                   value="{{ $fabricStore->rack_no ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text"
                   value="{{ $fabricStore->status }}"
                   readonly>
        </div>

    </div>

    <div class="form-group">
        <label>Remarks</label>

        <textarea rows="4" readonly>{{ $fabricStore->remarks ?? '-' }}</textarea>
    </div>

</div>

@endsection