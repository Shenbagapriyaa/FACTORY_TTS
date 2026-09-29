@extends('layouts.app')

@section('page-title', 'Relaxation Details')

@section('page-subtitle', 'View fabric relaxation information')

@section('content')

<div class="page-header">

    <div>
        <h2>Relaxation Details</h2>

        <p>
            Complete information about this relaxation record.
        </p>
    </div>

    <div>

        <a
            href="{{ route('relaxations.edit', $relaxation->id) }}"
            class="btn btn-primary"
        >
            Edit
        </a>

        <a
            href="{{ route('relaxations.index') }}"
            class="btn"
        >
            Back
        </a>

    </div>

</div>


<div class="form-card">

    <div class="form-grid">

        {{-- RELAXATION NO --}}
        <div class="form-group">

            <label>Relaxation No</label>

            <input
                type="text"
                value="{{ $relaxation->relaxation_no }}"
                readonly
            >

        </div>


        {{-- DATE --}}
        <div class="form-group">

            <label>Relaxation Date</label>

            <input
                type="text"
                value="{{ $relaxation->relaxation_date?->format('d-m-Y') }}"
                readonly
            >

        </div>


        {{-- FABRIC STORE --}}
        <div class="form-group">

            <label>Fabric Store</label>

            <input
                type="text"
                value="{{ $relaxation->fabricStore->store_no ?? '-' }}"
                readonly
            >

        </div>


        {{-- FABRIC --}}
        <div class="form-group">

            <label>Fabric</label>

            <input
                type="text"
                value="{{ ($relaxation->fabric->fabric_code ?? '-') . ' - ' . ($relaxation->fabric->fabric_name ?? '-') }}"
                readonly
            >

        </div>


        {{-- LOT / BATCH --}}
        <div class="form-group">

            <label>Lot / Batch No</label>

            <input
                type="text"
                value="{{ $relaxation->lot_batch_no ?? '-' }}"
                readonly
            >

        </div>


        {{-- INPUT QUANTITY --}}
        <div class="form-group">

            <label>Input Quantity</label>

            <input
                type="text"
                value="{{ $relaxation->input_quantity }} {{ $relaxation->unit }}"
                readonly
            >

        </div>


        {{-- START TIME --}}
        <div class="form-group">

            <label>Start Time</label>

            <input
                type="text"
                value="{{ $relaxation->start_time?->format('d-m-Y h:i A') ?? '-' }}"
                readonly
            >

        </div>


        {{-- END TIME --}}
        <div class="form-group">

            <label>End Time</label>

            <input
                type="text"
                value="{{ $relaxation->end_time?->format('d-m-Y h:i A') ?? '-' }}"
                readonly
            >

        </div>


        {{-- DURATION --}}
        <div class="form-group">

            <label>Duration</label>

            <input
                type="text"
                value="{{ $relaxation->duration_hours !== null ? $relaxation->duration_hours . ' Hours' : '-' }}"
                readonly
            >

        </div>


        {{-- STATUS --}}
        <div class="form-group">

            <label>Status</label>

            <input
                type="text"
                value="{{ $relaxation->status }}"
                readonly
            >

        </div>

    </div>


    {{-- REMARKS --}}
    <div class="form-group">

        <label>Remarks</label>

        <textarea
            rows="4"
            readonly
        >{{ $relaxation->remarks ?? '-' }}</textarea>

    </div>

</div>

@endsection